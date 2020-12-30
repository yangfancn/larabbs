@extends('layouts.app')

@section('title', '编辑个人资料')

@section('content')

<div class="container">
  <div class="col-md-8 offset-md-2">
    <div class="card">
      <div class="card-header">
        <h4><i class="fa fa-edit text-muted mr-2"></i>编辑个人资料</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          @include('shared._error')
          <div class="form-group">
            <label for="name-field">用户名</label>
            <input type="text" name="name" class="form-control" id="name-field" value="{{ old('name', $user->name) }}">
          </div>

          <div class="form-group">
            <label for="email-field">邮箱</label>
            <input type="text" name="email" class="form-control" id="email-field" value="{{ old('email', $user->email) }}">
          </div>

          <div class="form-group">
            <label for="introduction-field">个人简介</label>
            <textarea name="introduction" id="introduction-field" class="form-control" rows="3">{{ old('introduction', $user->introduction) }}</textarea>
          </div>

          <div class="form-group mb-4">
            <label for="" class="avatar-label">用户头像</label>
            <input type="file" name="avatar" class="form-control-file" accept="image/*">
            @if ($user->avatar)
              <br>
              <img src="{{ $user->avatar }}" alt="" width="200" class="thumbnail img-responsive">
            @endif
          </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
