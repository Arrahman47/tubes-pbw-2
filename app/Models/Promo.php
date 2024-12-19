

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_promo',
        'kode_promo', 
        'diskon',
        'tanggal_mulai',   
        'tanggal_berakhir',            
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'tanggal_mulai',
        'tanggal_berakhir', 
    ];
}
