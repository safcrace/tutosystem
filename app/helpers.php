<?php

function currentUser()
{
    return auth()->user();
}

if (! function_exists('csrf_field')) {
    function csrf_field()
    {
        return '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    }
}
