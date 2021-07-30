<?php

use Illuminate\Routing\Route;

if (!function_exists('page_title')) {
    function page_title($title)
    {
        $base = config('app.name') . ' ';
        if ($title == '') {
            return $base;

        } else {
            return $base . ' | ' . $title;
        }
    }
}

function platImg($path)
{
    return ($path) && file_exists('uploads/plats/' . $path) ?
    asset('uploads/plats/' . $path) : asset('storage/unkon.png');
}

function getPrice($prixInDecimals)
{
    $prix = $prixInDecimals / 1000;
    return number_format($prix, 3, '.', ' ') . ' GNF';

}

if (!function_exists('set_active_route')) {
    function set_active_route($route)
    {
        return Route::is($route) ? 'active' : '';
    }
}
