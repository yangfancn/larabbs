<?php

namespace App\Providers;

use App\Http\Controllers\TopicsController;
use App\Models\Topic;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Observers\TopicObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Reply::observe(\App\Observers\ReplyObserver::class);

        \Illuminate\Pagination\Paginator::useBootstrap();
        Topic::observe(TopicObserver::class);
        Schema::defaultStringLength(191);
    }
}
