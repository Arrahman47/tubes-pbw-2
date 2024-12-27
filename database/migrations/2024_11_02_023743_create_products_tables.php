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
            if (!Schema::hasColumn('products', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            }

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
                $table->string('kode_promo')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }

            $columns = [
                'nama',
                'tanggal_pemesanan',
                'pilihan_kategori',
                'gedung_asrama',
                'jumlah_kg',
                'total_harga',
                'no_kamar',
                'catatan',
                'kode_promo',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('products', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
