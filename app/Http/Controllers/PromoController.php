<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promo;  // Pastikan ada model Promo yang sesuai

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $promos = Promo::orderBy('id', 'DESC')->paginate(5);

        return view('promos.index', compact('promos'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('promos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:promos,name',
            'description' => 'required',
            'discount' => 'required|numeric',
        ]);

        Promo::create($request->all());

        return redirect()->route('promos.index')
                         ->with('success', 'Promo created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $promo = Promo::find($id);

        return view('promos.edit', compact('promo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'discount' => 'required|numeric',
        ]);

        $promo = Promo::find($id);
        $promo->update($request->all());

        return redirect()->route('promos.index')
                         ->with('success', 'Promo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        Promo::destroy($id);

        return redirect()->route('promos.index')
                         ->with('success', 'Promo deleted successfully');
    }
}
