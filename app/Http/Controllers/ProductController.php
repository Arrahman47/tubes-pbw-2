<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use PhpOffice\PhpWord\PhpWord;

use PhpOffice\PhpWord\IOFactory;

class ProductController extends Controller
{ 
    /**
     * Set up middleware for permissions.
     */
    public function __construct()
    {
        $this->middleware('permission:laundry-list|laundry-create|laundry-edit|laundry-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:laundry-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:laundry-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:laundry-delete', ['only' => ['destroy']]);
        $this->middleware('permission:laundry-accept', ['only' => ['accept']]);
        
    }

    public function printAll()
    {
        // Ambil semua data pesanan
        $products = Product::all();

        // Kirim data ke view cetak PDF
        $pdf = Pdf::loadView('products.print', compact('products'));

        // Download atau tampilkan file PDF
        return $pdf->stream('semua_pesanan.pdf');
    }
    public function generateWordInvoice($id)
    {
        $product = Product::findOrFail($id);
    
        // Membuat instance dari PHPWord
        $phpWord = new PhpWord();
    
        // Menambahkan halaman baru
        $section = $phpWord->addSection();
    
$section->addText(
    'Laundry Go',
    ['name' => 'Arial', 'size' => 24, 'bold' => true],
    ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]
);

// Menambahkan informasi pemesanan ke dokumen
$section->addTitle('Invoice Pemesanan Laundry Go', 1);
$section->addTitle('Terimakasih berikut pemesanan laundry anda: ', 2);
$section->addText('Nama: ' . $product->nama);
$section->addText('Tanggal Pemesanan: ' . $product->tanggal_pemesanan);
$section->addText('Gedung Asrama: ' . $product->gedung_asrama);
$section->addText('Jumlah (kg): ' . $product->jumlah_kg);
$section->addText('Total Harga: ' . $product->total_harga);
$section->addText('Catatan: ' . $product->catatan);
$section->addText('Status Pembayaran: ' . $product->status_pembayaran);
$section->addText('Alasan Reject: ' . ($product->alasan_reject ?? 'N/A'));

    
        // Menyimpan dokumen ke file
        $filePath = storage_path('app/public/invoices/' . 'invoice_' . $product->id . '.docx');
        $phpWord->save($filePath, 'Word2007');
    
        // Mengunduh file Word
        return response()->download($filePath);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

    $products = Product::query()
        ->when($search, function ($query, $search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('tanggal_pemesanan', 'like', "%{$search}%")
                  ->orWhere('gedung_asrama', 'like', "%{$search}%")
                  ->orWhere('no_kamar', 'like', "%{$search}%");
                })
       ->paginate(10);
    
        // Hitung jumlah Orders Pending
        $orderCountPending = Product::where('status_pembayaran', 'Pending')->count();
    
        // Hitung jumlah Orders Accepted
        $orderCountAccepted = Product::where('status_pembayaran', 'Accepted')->count();
    
        // Hitung jumlah Total Orders
        $orderCountTotal = Product::count();

        $orderCountRejected = Product::where('status_pembayaran', 'Rejected')->count();

    
        return view('products.index', compact('products', 'orderCountPending', 'orderCountAccepted', 'orderCountTotal', 'orderCountRejected'));
    }

    
    
    public function reject(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Validasi data
    $request->validate([
        'alasan_reject' => 'required|string|max:255',
    ]);

    // Update status dan alasan reject
    $product->update([
        'status_pembayaran' => 'Rejected',
        'alasan_reject' => $request->alasan_reject,
    ]);

    return redirect()->route('products.index')->with('success', 'Pesanan berhasil ditolak.');
}



public function accept($id)
{
    $product = Product::findOrFail($id);
    $product->status_pembayaran = 'Accepted';
    $product->save();

    return redirect()->route('products.index')->with('success', 'Pembayaran berhasil disetujui.');
}
public function show($id)
    {
        $product = Product::findOrFail($id); // Cari produk berdasarkan ID
        return view('products.show', compact('product')); // Tampilkan view detail produk
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'nama' => 'required|string',
        'tanggal_pemesanan' => 'required|date',
        'pilihan_kategori' => 'required|string',
        'gedung_asrama' => 'required|string',
        'jumlah_kg' => 'required|numeric|min:0',
        'no_kamar' => 'required|string|max:10',
        'total_harga' => '',
        'catatan' => 'nullable|string',
        'bukti_pembayaran' => 'nullable|image|mimes:jpeg,jpg,png,pdf|max:2048',
        'alasan_reject' => 'nullable|string',

    ]);
    $buktiPembayaran = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
    if ($request->hasFile('bukti_pembayaran')) {
        // Ambil file
        $file = $request->file('bukti_pembayaran');
        
        // Generate nama file unik
        $filename = time() . '.' . $file->getClientOriginalExtension();
        
        // Simpan file ke storage/public/bukti_pembayaran
        $file->storeAs('public/bukti_pembayaran', $filename);
        
        // Set path file ke kolom bukti_pembayaran
        $validated['bukti_pembayaran'] = 'storage/bukti_pembayaran/' . $filename;
    }
    $hargaPerKg = [
        'Komplit' => 6000,
        'Setrika' => 4000,
        'Cuci Kering' => 4000,
    ];

    // Dapatkan harga per kg berdasarkan kategori yang dipilih
    $harga = $hargaPerKg[$request->pilihan_kategori] ?? 0;

    // Hitung total harga
    $total_harga = $harga * $request->jumlah_kg;

    
    // Tambahkan data yang akan disimpan
    Product::create([
        'nama' => $request->nama,
        'tanggal_pemesanan' => $request->tanggal_pemesanan,
        'pilihan_kategori' => $request->pilihan_kategori,
        'gedung_asrama' => $request->gedung_asrama,
        'jumlah_kg' => $request->jumlah_kg,
        'no_kamar' => $request->no_kamar,
        'total_harga' => $total_harga,
        'catatan' => $request->catatan,
        'bukti_pembayaran' => $buktiPembayaran, // Menyimpan path file
        'status_pembayaran' => 'Pending', // Default status pembayaran
        'alasan_reject' => $request->alasan_reject ?? null,

       
    ]);

    return redirect()->route('products.index')->with('success', 'Pemesanan berhasil dibuat.');
}



    /**
     * Accept an order by updating its status.
     */
    /**public function accept($id)
{
    // Cari data order berdasarkan ID
    $order = Product::findOrFail($id);

    // Ubah status pembayaran menjadi "Accepted"
    $order->status_pembayaran = 'Accepted';
    $order->save();

    // Redirect kembali ke halaman orders dengan pesan sukses
    return redirect()->route('products.index')->with('success', 'Pesanan telah diterima.');
}
/** */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'nama' => 'required|string',
            'tanggal_pemesanan' => 'required|date',
            'pilihan_kategori' => 'required|string',
            'gedung_asrama' => 'required|string',
            'jumlah_kg' => 'required|numeric|min:0',
            'no_kamar' => 'required|string|max:10',
            'total_harga' => '',
            'catatan' => 'nullable|string',
            
        ]);
    
        // Definisikan harga berdasarkan kategori
        $hargaPerKg = [
            'Komplit' => 6000,
            'Setrika' => 4000,
            'Cuci Kering' => 4000,
        ];
    
        // Dapatkan harga per kg berdasarkan kategori yang dipilih
        $harga = $hargaPerKg[$request->pilihan_kategori] ?? 0;
        
        // Hitung total harga
        $total_harga = $harga * $request->jumlah_kg;
    
        // Perbarui data pemesanan
        $product->update([
            'nama' => $request->nama,
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'pilihan_kategori' => $request->pilihan_kategori,
            'gedung_asrama' => $request->gedung_asrama,
            'jumlah_kg' => $request->jumlah_kg,
            'no_kamar' => $request->no_kamar,
            'total_harga' => $total_harga, 
            'catatan' => $request->catatan,
            'status_pembayaran' => 'Pending',
        ]);
    
        return redirect()->route('products.index')->with('success', 'Pemesanan berhasil diperbarui.');
    }
    

    /**
     * Delete the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Pemesanan berhasil dihapus.');
    }

    /**
     * Update payment status for a product (if needed).
     */
    public function updatePaymentStatus(Request $request, int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->update(['status_pembayaran' => 'sudah_bayar']);

        return redirect()->route('products.index')->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}
