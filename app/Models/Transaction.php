<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'total_harga',
        'kurir',
        'alamat',
        'metode_pembayaran',
        'bukti_pembayaran',
        'status',
        'maksimal_tanggal_pembayaran'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
