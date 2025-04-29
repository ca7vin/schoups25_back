<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class EmailSettings extends Settings
{
    public string $contact;
    public string $facebook;
    public string $instagram;

    public static function group(): string
    {
        return 'email';
    }
}