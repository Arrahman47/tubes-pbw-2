<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nama',
        'pilihan_kategori',
        'gedung_asrama',
        'jumlah_kg',
        'total_harga',
        'no_kamar',
        'catatan',
        'bukti_pembayaran',
        'updated_at',
        'created_at',
        'tanggal_pemesanan', // Tambahkan kolom ini jika belum ada
        'status_pembayaran',
        'user_id',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'tanggal_pemesanan', // Pastikan format tanggal sesuai dengan database
    ];
}
