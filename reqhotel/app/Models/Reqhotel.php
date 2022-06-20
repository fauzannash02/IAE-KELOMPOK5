<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reqhotel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'reqhotel';
    protected $fillable =[
        'id_kamar',
        'nama_kamar',
        'fasilitas_kamar',
        'harga_kamar',
        'jumlah_kamar'
    ];
}
