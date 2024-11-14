<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
{
    $promos = Promo::paginate(10); // Pagination added
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
            'deskripsi' => 'required|string',
            'diskon' => 'nullable|numeric',
        ]);

        // Menyimpan data promo tanpa kode_promo, tanggal_mulai, tanggal_berakhir
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
            'deskripsi' => 'required|string',
            'diskon' => 'nullable|numeric',
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
