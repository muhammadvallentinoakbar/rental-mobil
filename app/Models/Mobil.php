<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = [
    'nama_mobil',
    'merk',
    'tahun',
    'harga_sewa',
    'status'
    ];
}
