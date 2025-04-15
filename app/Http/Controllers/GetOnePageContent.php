<?php

namespace App\Http\Controllers;

use App\Settings\BannerSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GetOnePageContent extends Controller
{
    public function __invoke(Request $request, BannerSettings $bannerSettings)
    {


        return [
            'banner_hero' => [
                'title' => $bannerSettings->home_title,
                'text' => $bannerSettings->home_text,
                'image' => Storage::disk('public')->url($bannerSettings->home_image),
            ],
            'banner_about' => [
                'title' => $bannerSettings->about_title,
                'text' => $bannerSettings->about_text,
                'image' => Storage::disk('public')->url($bannerSettings->about_image),
            ],
        ];
    }
}
