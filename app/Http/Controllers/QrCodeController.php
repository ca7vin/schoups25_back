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
        // Force la génération du QR code s'il n'existe pas
        $filePath = 'qrcodes/product-' . $glace->gout . '.png';
        $fullStoragePath = storage_path('app/public/' . $filePath);

        // Crée le QR code si le fichier n'existe pas
        if (!file_exists($fullStoragePath)) {
            $glace->generateQrCode(); // cette méthode doit créer le fichier
        }

        // Vérifie à nouveau après tentative de génération
        if (file_exists($fullStoragePath)) {
            return response()->download($fullStoragePath, 'qrcode-' . $glace->gout . '.png', [
                'Content-Type' => 'image/png',
            ]);
        }

        // Si toujours rien
        return response()->json(['error' => 'QR code non trouvé.'], 404);
    }
}
