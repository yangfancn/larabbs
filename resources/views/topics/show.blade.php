@extends('layouts.app')

@section('title', $topic->title)

@section('description', $topic->excerpt)

@section('content')
  <div class="row">
    <div class="col-lg-3 col-md-3 hidden-xs hidden-sm author-info">
      <div class="card">
        <div class="card-body">
          <div class="text-center">
            作者：{{ $topic->user->name }}
          </div>
          <hr>
          <div class="media">
            <div class="align-center">
              <a href="{{ route('users.show', $topic->user->id) }}">
                <img src="{{ $topic->user->avatar }}" class="thumbnail img-fluid" width="300px" height="300px">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">
      <div class="card">
        <div class="card-body">
          <h1 class="text-capitalize mt-3 mb-3">{{ $topic->title }}</h1>

          <div class="article-meta text-center text-secondary">
            {{ $topic->created_at->diffForHumans() }}
            •
            <i class="far fa-comment"></i>
            {{ $topic->reply_count }}
          </div>

          <div class="topic-body mt-4 mb-4">
            {!! $topic->body !!}
          </div>

          <div class="operate border-top pt-4">
            @can('update', $topic)
              <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-outline-secondary btn-sm" role="button"><i class="fa fa-edit mr-2"></i>编辑</a>
              <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('您确定要删除吗？')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-secondary">
                  <i class="far fa-trash-alt mr-2"></i>删除
                </button>
              </form>
            @endcan
          </div>
        </div>
        {{--    帖子回复    --}}
        <div class="card mt-4 topic-reply">
          <div class="card-body">
            @includeWhen(Auth::check(), 'topics._reply_box', ['topic' => $topic])
            @include('topics._reply_list', ['replies' => $topic->replies()->with('user')->get()])
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
