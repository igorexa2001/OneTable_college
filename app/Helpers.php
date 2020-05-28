<?php


function settings($key = null)
{
    if ($key === null) {
        return app(App\Settings::class);
    }
    return app(App\Settings::class)->get($key);
}
