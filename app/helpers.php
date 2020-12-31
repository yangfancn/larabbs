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


function category_nav_active($category_id) {
    return active_class(if_route('categories.show') && if_route_param('category', $category_id));
}
