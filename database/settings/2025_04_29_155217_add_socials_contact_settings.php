<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('email.facebook', '');
        $this->migrator->add('email.instagram', '');
    }
};
