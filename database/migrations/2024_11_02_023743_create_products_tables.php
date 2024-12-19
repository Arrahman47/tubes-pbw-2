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
            // Tambahkan kolom baru jika belum ada
            if (!Schema::hasColumn('products', 'promo_id')) {
                $table->unsignedBigInteger('promo_id')->nullable(); // Kolom foreign key
                $table->foreign('promo_id') // Definisi foreign key
                    ->references('id')
                    ->on('promos')
                    ->onDelete('set null');
            }

            if (!Schema::hasColumn('products', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable(); // Foreign key ke users
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            }

            // Pastikan kolom lainnya sudah benar
            if (!Schema::hasColumn('products', 'nama')) {
                $table->string('nama')->nullable();
            }
            if (!Schema::hasColumn('products', 'tanggal_pemesanan')) {
                $table->date('tanggal_pemesanan')->nullable();
            }
            if (!Schema::hasColumn('products', 'pilihan_kategori')) {
                $table->string('pilihan_kategori')->nullable();
            }
            if (!Schema::hasColumn('products', 'gedung_asrama')) {
                $table->string('gedung_asrama')->nullable();
            }
            if (!Schema::hasColumn('products', 'jumlah_kg')) {
                $table->decimal('jumlah_kg', 8, 2)->nullable();
            }
            if (!Schema::hasColumn('products', 'total_harga')) {
                $table->decimal('total_harga', 10, 2)->nullable();
            }
            if (!Schema::hasColumn('products', 'no_kamar')) {
                $table->string('no_kamar')->nullable();
            }
            if (!Schema::hasColumn('products', 'catatan')) {
                $table->text('catatan')->nullable();
            }
            if (!Schema::hasColumn('products', 'kode_promo')) {
                $table->text('kode_promo')->nullable();
            }
            if (!Schema::hasColumn('products', 'user_id')) {
                $table->text('user_id')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop foreign key sebelum menghapus kolom
            if (Schema::hasColumn('products', 'promo_id')) {
                $table->dropForeign(['promo_id']);
                $table->dropColumn('promo_id');
            }
            if (Schema::hasColumn('products', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }

            // Drop kolom lainnya
            $table->dropColumn([
                'nama',
                'tanggal_pemesanan',
                'pilihan_kategori',
                'gedung_asrama',
                'jumlah_kg',
                'total_harga',
                'no_kamar',
                'catatan',
            ]);
        });
    }
};
