<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'gambar', 'slug', 'kategori_id', 'deskripsi', 'kuantitas', 'harga'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id', 'id');
    }
}
