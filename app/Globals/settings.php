<?php

function settings($key, $default = '')
{
    $settings = App\Models\Setting::where('key', $key)->first();
    if($settings)
    {
        return $settings->value;
    }
    else
    {
        return $default;
    }
}

?>
