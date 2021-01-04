<?php

namespace App\Observers;

use App\Handlers\SlugTranslateHandler;
use App\Jobs\TranslateSlug;
use App\Models\Topic;


// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving(Topic $topic)
    {
        $topic->body = clean($topic->body, 'user_topic_body');
        $topic->excerpt = make_expert($topic->body);
    }

    public function saved(Topic $topic)
    {
        if ( ! $topic->slug) {
            //推送到队列
            dispatch(new TranslateSlug($topic));
        }
    }

}
