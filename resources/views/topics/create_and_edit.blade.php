@extends('layouts.app')

@section('content')
<div class="col-md-10 offset-md-1">
  <div class="card">
    <div class="card-header">
      <h2 class="">
        <i class="fa fa-edit"></i>
        @if ($topic->id)
        编辑话题
        @else
        新建话题
        @endif
      </h2>
    </div>
    <div class="card-body">
      <form action="{{ $topic->id ? route('topics.edit', $topic->id) : route('topics.store') }}" method="POST"
        accept-charset="UTF-8">
        @if ($topic->id)
        @method('PUT')
        @endif
        @csrf
        @include('shared._error')
        <div class="form-group">
          <input type="text" name="title" class="form-control" value="{{ old('title', $topic->title) }}"
            placeholder="请填写标题" required>
        </div>

        <div class="form-group">
          <select name="category_id" class="form-control" required>
            <option value="" hidden disabled selected>请选择分类</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <textarea name="body" rows="6" id="editor" class="form-control" placeholder="话题内容(请输入最少3个字符)..." required></textarea>
        </div>

        <div class="well well-sm">
          <button class="btn btn-primary" type="submit"><i class="fa fa-save mr-2"></i>保存</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('style')
  <link rel="stylesheet" href="{{ asset('css/simditor.css') }}">
@endsection

@section('script')
  <script src="{{ asset('js/module.js') }}"></script>
  <script src="{{ asset('js/hotkeys.js') }}"></script>
  <script src="{{ asset('js/uploader.js') }}"></script>
  <script src="{{ asset('js/simditor.js') }}"></script>
  <script>
    $(document).ready(function() {
      var editor = new Simditor({
        textarea: $('#editor'),
        defaultImage: '/images/image.png',
        upload: {
          url: '{{ route('topics.upload_image') }}',
          params: {
            _token: '{{ csrf_token() }}'
          },
          fileKey: 'upload_file',
          connectionCount: 3,
          leaveConfirm: "文件上传中，关闭此页面将取消上传"
        },
        pasteImage: true,
      })
    })
  </script>
@endsection
