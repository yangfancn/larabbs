@if (count($topics))
  <ul class="list-unstyled">
    @foreach ($topics as $topic)
        <li class="media pb-3 mb-3 border-bottom">
          <div class="media-left">
            <a href="{{ route('users.show', $topic->user_id) }}">
              <img src="{{ $topic->user->avatar }}" alt="{{ $topic->user->name }}" class="mr-3 media-object img-thumbnail">
            </a>
          </div>
          <div class="media-body">
            <div class="media-heading mt-0 mb-1">
              <a href={{ $topic->link() }}" title="{{ $topic->title }}">{{ $topic->title }}</a>
              <a href="javascript:;" class="float-right">
                <span class="badge badge-secondary badge-pill">{{ $topic->reply_count }}</span>
              </a>
            </div>
            <small class="media-body meta text-secondary">
              <a href="{{ route('categories.show', $topic->category->id) }}" class="text-secondary" title="{{ $topic->category->name }}">
                <i class="far fa-folder mr-1"></i>{{ $topic->category->name }}
              </a>
              <span class="mx-2"> • </span>
              <a href="{{ route('users.show', $topic->user_id) }}" class="text-secondary"><i class="far fa-user mr-1"></i>{{ $topic->user->name }}</a>
              <span class="mx-2"> • </span>
              <a href="javascript:;" class="text-muted" title="最后活跃于：{{ $topic->user->created_at }}">
                <i class="far fa-clock mr-1"></i>最后活跃于：{{ $topic->user->created_at->diffForHumans() }}
              </a>
            </small>
          </div>
        </li>
    @endforeach
  </ul>
@else
  <div class="empty-block">暂无数据 -。-</div>
@endif
