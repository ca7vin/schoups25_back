<?php

namespace App\Http\Controllers;

use App\Models\Glace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GetGlaces extends Controller
{
    public function __invoke(Request $request)
    {
        $glaces = Glace::orderBy('order_column')->get();
        return $glaces->map(function ($glace) {
            $imageUrl = (Storage::disk('public')->url($glace->image));
            return [
                'id' => $glace->id,
                'gout' => $glace->gout,
                'image' => $imageUrl,
                'ingredients' =>$glace->ingredients,
                'nutrition' =>$glace->nutrition,
            ];
        });
    }
}
