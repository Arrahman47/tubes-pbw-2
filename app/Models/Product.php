<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'pilihan_kategori',
        'gedung_asrama',
        'jumlah_kg',
        'no_kamar',
        'catatan',
        'updated_at',
        'created_at',
        'tanggal_pemesanan', // Tambahkan kolom ini jika belum ada
        'total_harga', 
        'status_pembayaran',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'tanggal_pemesanan', // Pastikan format tanggal sesuai dengan database
    ];
}
