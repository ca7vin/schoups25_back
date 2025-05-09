<?php

namespace App\Models;

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
        $writer = new PngWriter();
        $url = "https://schoupsfront2025-production.up.railway.app/#product-{$this->id}";
        $qr = QrCode::create($url)
            ->setSize(300)
            ->setMargin(10);

        $result = $writer->write($qr);

        $path = "qrcodes/qrcode-{$this->gout}.png";
        Storage::disk('public')->put($path, $result->getString());

        return Storage::url($path);
    }
}
