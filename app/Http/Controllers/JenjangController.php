<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Http\Requests\StoreJenjangRequest;
use App\Http\Requests\UpdateJenjangRequest;

class JenjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenjang = Jenjang::all();
        return view("admin.jenjang.index")->with("jenjang",$jenjang);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.jenjang.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJenjangRequest $request)
    {
        $jenjang = New Jenjang();
        $jenjang->nama_jenjang = $request->jenjang;
        $jenjang->save();

        return redirect('/jenjang');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenjang $jenjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenjang = Jenjang::find($id);
        if(!$jenjang) return redirect('/jenjang')->with('errors', "Jenjang tidak ditemukan");
        return view('admin.jenjang.edit')->with('jenjang', $jenjang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenjangRequest $request, $id)
    {
        $jenjang = Jenjang::find($id);
        $jenjang->nama_jenjang = $request->jenjang;
        $jenjang->update();

        return redirect('/jenjang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenjang = Jenjang::find($id);

        if (!$jenjang) return redirect('/jenjang')->with('errors', "Jenjang tidak ditemukan");
        $jenjang->delete();

        return redirect('/jenjang');
    }
}