<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('marquee.text', '');
        $this->migrator->add('marquee.active', '');
    }
};
