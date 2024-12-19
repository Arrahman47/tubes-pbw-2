

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
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_promo');
            $table->text('kode_promo')->nullable();
            $table->decimal('diskon', 5, 2)->nullable(); // Misal, diskon dalam persentase
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('promos');
    }
};
