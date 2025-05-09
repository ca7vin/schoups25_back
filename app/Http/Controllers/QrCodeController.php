<?php

namespace App\Http\Controllers;

use App\Models\Glace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class QrCodeController extends Controller
{
    public function download(Glace $glace)
    {
        // Générer le QR code et obtenir le chemin de stockage
        $filePath = 'qrcodes/product-' . $glace->id . '.png';

        // Vérifie si le fichier existe dans le stockage public
        if (Storage::exists('public/' . $filePath)) {
            $fileContents = Storage::get('public/' . $filePath);

            return response($fileContents, 200)
                ->header('Content-Type', 'image/png')
                ->header('Content-Disposition', 'attachment; filename="qrcode-' . $glace->gout . '.png"');
        }

        // Si le fichier n'existe pas
        return response()->json(['error' => 'QR code non trouvé.'], 404);
    }
}

