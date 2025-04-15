<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class BannerSettings extends Settings
{
    public string $home_title;
    public string $home_text;
    public string $home_image;
    public string $about_title;
    public string $about_text;
    public string $about_image;

    public static function group(): string
    {
        return 'banner';
    }
}