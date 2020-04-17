<?php

use App\Lang;

function getLangSlugId()
{
    $lang_slug = request()->lang;
    $lang = Lang::where('slug', $lang_slug)->first();
    return $lang ? $lang->id : 1;
}

function getLangSlugIdByCode($code)
{
    $lang = Lang::where('slug', $code)->first();
    return $lang ? $lang->id : 1;
}
