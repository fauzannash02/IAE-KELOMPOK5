<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tiket_transportasi extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'tiket_transportasi';
    protected $fillable = [
        'id_tiket',
        'id_transportasi',
        'nama_pelanggan',
        'nomor_kursi',
        'tanggal',
        'asal_keberangkatan',
        'tujuan_keberangkatan'
    ];

    protected $hidden = [];
}
