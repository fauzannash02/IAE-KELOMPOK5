<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiketapp extends Model
{
    use HasFactory;

    protected $table = 'tiket_app';
    protected $fillable = [
            'id_pesanan',
            'id_pelanggan',
            'nama_pelanggan',
            'id_tiket_hotel',
            'id_tiket_transportasi',
            'tanggal_pesanan',
            'total_harga',
            'metode_pembayaran',
            'tanggal_pembayaran'
    ];
}
