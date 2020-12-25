<?php

use Illuminate\Support\Facades\Route;

/**
 * 返回当前路由名称
 *
 * @return sting
 */
function route_class()
{
    return str_replace('.', '_', Route::currentRouteName());
}
