<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transportasi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transport';
    protected $fillable = [
        'IDTransportasi',
        'IDRute',
        'IDJadwal',
        'IDClass',
        'Armada',
        'RutedanTujuan',
        'JadwalKeberangkatan',
        'JumlahSeat',
        'TipeClass',
        'Harga'
    ];

    protected $hidden = [];
}
