<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->date('tanggal_pemesanan')->nullable();
        $table->string('pilihan_kategori')->nullable();
        $table->string('gedung_asrama')->nullable();
        $table->decimal('jumlah_kg', 8, 2)->nullable();
        $table->string('no_kamar')->nullable();
        $table->text('catatan')->nullable();
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn([
            'tanggal_pemesanan',
            'pilihan_kategori',
            'gedung_asrama',
            'jumlah_kg',
            'no_kamar',
            'catatan',
        ]);
    });
}

};
