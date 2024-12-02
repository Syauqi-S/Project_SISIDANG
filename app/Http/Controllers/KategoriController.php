<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view("admin.kategori.index")->with("kategoris",$kategoris);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view("admin.kategori.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriRequest $request)
    {
        $kategori = new Kategori();
        $kategori->kategori = $request->kategori;
        $kategori->save();

        return redirect('/kategori');

    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        if(!$kategori) return redirect('/kategori')->with('errors',"Kategori tidak ditemukan");
        return view('admin.kategori.edit')->with("kategori", $kategori);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->kategori = $request->kategori;
        $kategori->update();

        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if(!$kategori) return redirect('/kategori')->with('errors',"Kategori tidak ditemukan");
        $kategori->delete();

        return redirect('/kategori');
    }
}