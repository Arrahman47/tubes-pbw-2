<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_promo',
        'deskripsi',
        'kode_promo',
        'diskon', // Persentase atau nilai diskon yang diberikan
        'tanggal_mulai',
        'tanggal_berakhir',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'tanggal_mulai',
        'tanggal_berakhir',
        'created_at',
        'updated_at',
    ];
}
