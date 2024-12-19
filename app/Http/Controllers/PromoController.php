

/**namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Product;
use Illuminate\Http\Request;

class PromoController extends Controller
{
     public function __construct()
    {
        $this->middleware('permission:promo-list|promo-create|promo-edit|promo-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:promo-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:promo-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:promo-delete', ['only' => ['destroy']]);
    }

    public function applyPromo(Request $request)
    {
        $promo = Promo::where('kode promo', $request->kode_promo)->first();

        if ($promo && $promo->tanggal_mulai <= now() && $promo->tanggal_berakhir >= now()) {
            // Hitung total harga setelah diskon
            $total_harga = $request->total_harga * (1 - ($promo->diskon / 100));

            return response()->json([
                'diskon' => $promo->diskon,
                'total_harga' => $total_harga
            ]);
        }

        return response()->json(['error' => 'Kode promo tidak valid atau sudah expired'], 422);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function index()
{
    $promos = Promo::paginate(10); 
    return view('promos.index', compact('promos'));
}

    public function create()
    {
        return view('promos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_promo' => 'required',
            'kode_promo' => 'required|string',
            'diskon' => 'nullable|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        Promo::create($request->all());

        return redirect()->route('promos.index')->with('success', 'Promo created successfully.');
    }

    public function show(Promo $promo)
    {
        return view('promos.show', compact('promo'));
    }

    public function edit(Promo $promo)
    {
        return view('promos.edit', compact('promo'));
    }

    public function update(Request $request, Promo $promo)
    {
        $request->validate([
            'nama_promo' => 'required',
            'kode_promo' => 'required|string',
            'diskon' => 'nullable|numeric',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $promo->update($request->all());

        return redirect()->route('promos.index')->with('success', 'Promo updated successfully.');
    }

    public function destroy(Promo $promo)
    {
        $promo->delete();

        return redirect()->route('promos.index')->with('success', 'Promo deleted successfully.');
    }
}
