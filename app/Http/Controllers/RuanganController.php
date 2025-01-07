<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Http\Requests\StoreRuanganRequest;
use App\Http\Requests\UpdateRuanganRequest;
use Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangans = Ruangan::all();
        return view("admin.ruangan.index")->with("ruangans", $ruangans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view("admin.ruangan.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRuanganRequest $request)
    {
        $ruangan = New Ruangan();
        $ruangan->ruangan = $request->ruangan;
        $ruangan->save();

        return redirect('/ruangan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruangan $ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ruangan = Ruangan::find($id);
        if(!$ruangan) return redirect('/ruangan')-with('errors',"Ruangan tidak ditemukan");
        return view("admin.ruangan.edit")->with("ruangan", $ruangan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRuanganRequest $request, $id)
    {
        $ruangan = Ruangan::find($id);
        $ruangan->ruangan = $request->ruangan;
        $ruangan->update();

        return redirect('/ruangan');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ruangan = Ruangan::find($id);
        if(!$ruangan) return redirect('/ruangan')->with('error',"Ruangan tidak ditemukan");
        $ruangan->delete();

        return redirect('/ruangan');
    }
}