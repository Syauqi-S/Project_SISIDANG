<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Prodi;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with(['jurusan','prodi'])->get();
        return view("admin.mahasiswa.index")->with('mahasiswas', $mahasiswas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::with('prodi')->get();

        // return response()->json($jurusan);
        return view("admin.mahasiswa.create")->with('jurusans', $jurusan);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMahasiswaRequest $request)
    {
        $request->validate([
            'nobp' => 'required',
            'nama' => 'required',
            'jurusan' => 'required',
            'prodi' => 'required'
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->no_bp = $request->nobp;
        $mahasiswa->nama_mhs = $request->nama;
        $mahasiswa->id_jurusan = $request->jurusan;
        $mahasiswa->id_prodi = $request->prodi;
        $mahasiswa->save();

        return redirect('/mahasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::with(['jurusan','prodi'])->find($id);
        // $mahasiswas = Mahasiswa::with(['jurusan','prodi'])->get();
        return view("admin.mahasiswa.detail")->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $prodi = Prodi::where('id_jurusan', $mahasiswa->id_jurusan)->get();
        $jurusans = Jurusan::all();
        
        // validasi jika user id tidak di temukan ketika ingin mengedit
        if (!$prodi) return redirect('/prodi')->with('errors', "Prodi tidak ditemukan");
        return view('admin.mahasiswa.edit')->with([
            'prodi'=> $prodi,
            'jurusans' => $jurusans,
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaRequest $request, $id)
    {
        $request->validate([
            'nama'=>'required',
            'jurusan'=>'required',
            'prodi'=>'required'
        ]);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama_mhs = $request->nama;
        $mahasiswa->id_jurusan = $request->jurusan;
        $mahasiswa->id_prodi = $request->prodi;
        $mahasiswa->update();

        return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if(!$mahasiswa) return redirect('/mahasiswa')->with('errors','Mahasiswa tidak ditemukan');
        $mahasiswa->delete();

        return redirect('/mahasiswa');
    }
}