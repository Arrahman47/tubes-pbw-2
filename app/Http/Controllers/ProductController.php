<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
{
    $products = Product::latest()->paginate(5);

    if ($products->isEmpty()) {
        return view('products.index')->with('message', 'No products found.');
    }

    return view('products.index', compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tanggal_pemesanan' => 'required|date',
            'pilihan_kategori' => 'required|string',
            'gedung_asrama' => 'required|string',
            'jumlah_kg' => 'required|numeric',
            'no_kamar' => 'required|string',
            'catatan' => 'required|string',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product): View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product): RedirectResponse
{
    $request->validate([
        'tanggal_pemesanan' => 'required|date',
        'pilihan_kategori' => 'required|string',
        'gedung_asrama' => 'required|string',
        'jumlah_kg' => 'required|numeric',
        'no_kamar' => 'required|string',
        'catatan' => 'required|string',
    ]);

    $product->update([
        'tanggal_pemesanan' => $request->tanggal_pemesanan,
        'pilihan_kategori' => $request->pilihan_kategori,
        'gedung_asrama' => $request->gedung_asrama,
        'jumlah_kg' => $request->jumlah_kg,
        'no_kamar' => $request->no_kamar,
        'catatan' => $request->catatan,
    ]);

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }
}
