<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'category_id',
        'kategori',
        'stok',
        'satuan',
        'lokasi',
        'deskripsi',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
