<?php

namespace App\Observers;

use App\Models\Topic;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function saving($topic)
    {
        $topic->excerpt = make_expert($topic->body);
    }
}
