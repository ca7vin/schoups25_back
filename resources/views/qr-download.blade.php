@php
    $url = $getRecord()?->generateQrCode();
@endphp

@if ($url)
    <div class="">
        <a href="{{ $url }}" download target="_blank"
           class="filament-button inline-flex items-center justify-center rounded-lg border border-transparent bg-primary-600 px-4 py-2 text-sm font-medium text-white shadow transition hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
            Télécharger le QR Code
        </a>
    </div>
@else
    <div class="text-center text-sm text-gray-500">
        QR code non disponible.
    </div>
@endif
