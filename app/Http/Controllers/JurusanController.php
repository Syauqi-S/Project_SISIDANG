<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Http\Requests\StoreJurusanRequest;
use App\Http\Requests\UpdateJurusanRequest;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view("admin.jurusan.index")->with('jurusan', $jurusan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.jurusan.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJurusanRequest $request)
    {
        $jurusan = new Jurusan();
        $jurusan->Jurusan = $request->jurusan;
        $jurusan->save();

        return redirect('/jurusan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jurusan = Jurusan::find($id);
        // validasi jika user id tidak di temukan ketika ingin mengedit
        if (!$jurusan) return redirect('/jurusan')->with('errors', "Jurusan tidak ditemukan");
        return view('admin.jurusan.edit')->with('jurusan', $jurusan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJurusanRequest $request, $id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->Jurusan = $request->jurusan;
        $jurusan->update();

        return redirect('/jurusan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);

    //    if (!$user) return response()->json(["statusCode"=>404, "msg"=>"User tidak ditemukan"]); 
    // validasi jika user id tidak di temukan ketika ingin delete
    if (!$jurusan) return redirect('/jurusan')->with('errors', "Jurusan tidak ditemukan");
        $jurusan->delete();

        return redirect('/jurusan');
    }
}