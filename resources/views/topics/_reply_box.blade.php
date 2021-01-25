@include('shared._error')

<div class="reply-box mb-4">
  <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
    @csrf
    <input type="hidden" name="topic_id" value="{{ $topic->id }}">
    <div class="form-group">
      <textarea name="content" rows="3" class="form-control" placeholder="分享你的见解"></textarea>
    </div>
    <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-share mr-1"></i>回复</button>
  </form>
</div>
