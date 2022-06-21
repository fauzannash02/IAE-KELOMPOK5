<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table= 'pelanggans';
    protected $fillable=[
        'nama_pelanggan', 'tanggal_lahir', 'jenis_kelamin', 'asal_daerah', 'no_hp', 'email'
    ];

    protected $hidden= [];
}
