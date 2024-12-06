<?php

namespace App\Http\Controllers;

use App\Models\Promo;
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
            'deskripsi' => 'required|string',
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
            'deskripsi' => 'required|string',
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
