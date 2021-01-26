<li class="media @if ($loop->last) border-bottom @endif notification-topic-reply-item">
  <div class="media-left">
    <a href="{{ route('users.show', $notification->data['user_id']) }}">
      <img src="{{ $notification->data['user_avatar'] }}" alt="{{ $notification->data['user_name'] }}"
           class="media-object img-thumbnail mr-3">
    </a>
  </div>
  <div class="media-body">
    <div class="media-heading mt-0 mb-1 text-secondary">
      <a href="{{ route('users.show', $notification->data['user_id']) }}">{{ $notification->data['user_name'] }}</a>
      <span>评论了</span>
      <a href="{{ $notification->data['topic_link'] }}">{{ $notification->data['topic_title'] }}</a>
      {{--删除回复--}}
      <span class="meta float-right" title="{{ $notification->created_at }}">
          <i class="far fa-clock"></i>
          {{ $notification->created_at->diffForhumans() }}
        </span>
      <div class="reply_content">
        {!! $notification->data['reply_content'] !!}
      </div>
    </div>
  </div>

</li>
