<?php

namespace App\Http\Controllers;

use App\Models\Glace;
use App\Models\Partner;
use App\Settings\BannerSettings;
use App\Settings\EmailSettings;
use App\Settings\MarqueeSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GetOnePageContent extends Controller
{
    public function __invoke(Request $request, BannerSettings $bannerSettings, EmailSettings $emailContact, MarqueeSettings $marquee)
    {
        $partners = Partner::orderBy('order_column')->get();
        $glaces = Glace::orderBy('order_column')->get();

        return [
            'marquee' => [
                'text' => $marquee->text,
                'active' => $marquee->active ? true:false,
            ],
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
            'partners' => $partners->map(function ($partner) {
                $imageUrl = (Storage::disk('public')->url($partner->image));
                return [
                    'nom' => $partner->nom,
                    'image' => $imageUrl
                ];
            }),
            'glaces' => $glaces->map(function ($glace) {
                $imageUrl = (Storage::disk('public')->url($glace->image));
                return [
                    'id' => $glace->id,
                    'categorie' => $glace->categorie,
                    'gout' => $glace->gout,
                    'image' => $imageUrl,
                    'ingredients' => $glace->ingredients,
                    'nutrition' => $glace->nutrition,
                ];
            }),
            'footer' => [
                'facebook' => $emailContact->facebook,
                'instagram' => $emailContact->instagram,
            ],
        ];
    }
}
