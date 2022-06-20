<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'hotel';
    protected $fillable = [
        'nama_kamar',
        'gambar_kamar',
        'fasilitas_kamar',
        'harga_kamar',
        'jumlah_kamar',
        'tanggal_check_in',
        'tanggal_check_out'
    ];

    protected $hidden = [];
}

