<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatans = Jabatan::all();
        return view("admin.jabatan.index")->with("jabatans",$jabatans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.jabatan.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJabatanRequest $request)
    {
        $jabatan = New Jabatan();
        $jabatan->jabatan = $request->jabatan;
        $jabatan->save();

        return redirect('/jabatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jabatan = Jabatan::find($id);
        if(!$jabatan) return redirect('/jabatan')->with('errors',"Jabatan tidak ditemukan");
        return view("admin.jabatan.edit")->with("jabatan",$jabatan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJabatanRequest $request, $id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->jabatan = $request->jabatan;
        $jabatan->update();

        return redirect('/jabatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        if(!$jabatan) return redirect('/jabatan')->with('errors',"Jabatan tidak ditemukan");
        $jabatan->delete();

        return redirect('/jabatan');
    }
}