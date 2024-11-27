<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Prodi;
use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::with(['jurusan','prodi'])->get();
        return view('admin.dosen.index')->with('dosens',$dosens);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::with('prodi')->get();
        // return response()->json($jurusan);
        return view("admin.dosen.create")->with('jurusans', $jurusan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDosenRequest $request)
    {
        $request->validate([
            'nidn'=>'required',
            'nip'=>'required',
            'nama'=>'required',
            'jurusan'=>'required',
            'prodi'=>'required'
        ]);

        $dosen = New Dosen();
        $dosen->nidn = $request->nidn;
        $dosen->nip = $request->nip;
        $dosen->nama = $request->nama;
        $dosen->id_jurusan = $request->jurusan;
        $dosen->id_prodi = $request->prodi;
        $dosen->save();

        return redirect('/dosen');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dosen = Dosen::find($id);
        $prodi = Prodi::where('id_jurusan', $dosen->id_jurusan)->get();
        $jurusans = Jurusan::all();
        
        // validasi jika user id tidak di temukan ketika ingin mengedit
        if (!$prodi) return redirect('/prodi')->with('errors', "Prodi tidak ditemukan");
        return view('admin.dosen.edit')->with([
            'prodi'=> $prodi,
            'jurusans' => $jurusans,
            'dosen' => $dosen
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDosenRequest $request, $id)
    {
        $request->validate([
            'nama'=>'required',
            'jurusan'=>'required',
            'prodi'=>'required'
        ]);

        $dosen = Dosen::find($id);
        $dosen->nama = $request->nama;
        $dosen->id_jurusan = $request->jurusan;
        $dosen->id_prodi = $request->prodi;
        $dosen->update();

        return redirect('/dosen');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dosen = Dosen::find($id);
        if(!$dosen) return redirect('/dosen')->with('errors','Dosen Tidak ditemukan');
        $dosen->delete();

        return redirect('/dosen');
    }
}