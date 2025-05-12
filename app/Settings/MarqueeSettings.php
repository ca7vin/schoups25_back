<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class MarqueeSettings extends Settings
{
    public string $text;
    public string $active;

    public static function group(): string
    {
        return 'marquee';
    }
}