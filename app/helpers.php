<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
/**
 * 返回当前路由名称
 *
 * @return sting
 */
function route_class()
{
    return str_replace('.', '_', Route::currentRouteName());
}

function active_class(bool $bool)
{
    if ($bool) {
        return 'active';
    }
}

function if_route(string $route)
{
    return request()->route()->named($route);
}

function if_route_param($param, $value)
{
    $param = request()->route()->parameter($param);
    return $param && (is_object($param) ? $param->id : $param) == $value;
}

function if_query($query, $value)
{
    $value = $value == null ? '' : $value;
    return request()->$query == $value;
}


function category_nav_active($category_id) {
    return active_class(if_route('categories.show') && if_route_param('category', $category_id));
}

function make_expert($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return Str::limit($excerpt, $length, '...');
}
