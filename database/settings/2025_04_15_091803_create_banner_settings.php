<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('banner.home_title', '');
        $this->migrator->add('banner.home_text', '');
        $this->migrator->add('banner.home_image', '');
        $this->migrator->add('banner.about_title', '');
        $this->migrator->add('banner.about_text', '');
        $this->migrator->add('banner.about_image', '');
    }
};
