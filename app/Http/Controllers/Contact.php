<?php

namespace App\Http\Controllers;

use App\Settings\EmailSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Contact extends Controller
{
    public function sendEmail(Request $request, EmailSettings $emailContact)
    {
        // Validez les données du formulaire ici si nécessaire
        $contactMail = $emailContact->contact;
        // Envoyez l'e-mail
        Mail::to($contactMail)->send(new ContactFormMail($request->all()));

        return response()->json(['message' => 'E-mail envoyé avec succès'], 200);
    }
}
