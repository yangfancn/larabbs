<ul class="list-unstyled">
  @foreach ($replies as $index => $reply)
    <li class="media" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
      <div class="media-left">
        <a href="{{ route('users.show', [$reply->user_id]) }}">
          <img src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}" class="media-object img-thumbnail mr-3">
        </a>
      </div>
      <div class="media-body">
        <div class="media-heading mt-0 mb-1 text-secondary">
          <a href="{{ route('users.show', [$reply->user_id]) }}" title="{{ $reply->user->name }}">
            {{ $reply->user->name }}
          </a>
          <span class="text-secondary mx-2">•</span>
          <span class="meta text-secondary" title="{{ $reply->created_at }}">{{$reply->created_at->diffForHumans()}}</span>
          {{--     删除回复     --}}
          <span class="meta float-right">
            <a href="javascript:;" title="删除回复"><i class="far fa-trash-alt"></i></a>
          </span>
        </div>
        <div class="reply-content text-secondary">
          {!! $reply->content !!}
        </div>
      </div>
    </li>

    @if ( ! $loop->last)
      <hr>
    @endif
  @endforeach
</ul>
