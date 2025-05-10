<?php

namespace App\Models;

use Endroid\QrCode\Builder\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;

class Glace extends Model implements Sortable
{
    use HasFactory;
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gout',
        'image',
        'ingredients',
        'nutrition',
        'categorie'
    ];

    protected $casts = [
        'ingredients' => 'array',
        'nutrition' => 'array'
    ];

    public function generateQrCode()
    {
        $filePath = 'qrcodes/product-' . $this->gout . '.png';
        $fullPath = storage_path('app/public/' . $filePath);

        if (!file_exists($fullPath)) {
            $url = 'https://schoupsfront2025-production.up.railway.app/#product-' . $this->id;

            $result = Builder::create()
                ->writer(new PngWriter())
                ->data($url)
                ->size(300)
                ->margin(10)
                ->build();

            // Enregistre le fichier PNG dans le disque public
            file_put_contents($fullPath, $result->getString());
        }

        return Storage::url($filePath);
    }
}
