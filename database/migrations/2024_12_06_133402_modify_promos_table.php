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
        Schema::table('promos', function (Blueprint $table) {
            // Menambahkan kolom baru atau perubahan lainnya
            $table->string('kode_promo')->nullable();  // Contoh menambahkan kolom baru
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('promos', function (Blueprint $table) {
            // Menghapus kolom jika rollback
            $table->dropColumn('kode_promo');
        });
    }
};
