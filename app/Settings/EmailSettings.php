<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class EmailSettings extends Settings
{
    public string $contact;

    public static function group(): string
    {
        return 'email';
    }
}