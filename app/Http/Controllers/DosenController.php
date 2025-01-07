<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Prodi;
use App\Models\Kategori;
use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::with(['jurusan', 'kategori'])->get();
        return view('admin.dosen.index')->with('dosens', $dosens);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return response()->json($jurusan);
        $jurusan = Jurusan::all();
        $kategoris = Kategori::all();
        return view("admin.dosen.create")->with([
            'jurusans' => $jurusan,
            'kategoris' => $kategoris
        ]);
    }

    public function getDosenKategori($kategori_id)
    {
        $dosenKategori = Dosen::whereHas('kategori', function ($query) use ($kategori_id) {
            $query->where('id_kategori', $kategori_id);
        })->get();
        return response()->json([
            "success" => true,
            "msg" => "successfully get data",
            "data" => $dosenKategori
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDosenRequest $request)
    {
        $request->validate([
            'nidn' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'jurusan' => 'required',
            'kategori' => 'required|array'
        ]);

        $dosen = new Dosen();
        $dosen->nidn = $request->nidn;
        $dosen->nip = $request->nip;
        $dosen->nama = $request->nama;
        $dosen->id_jurusan = $request->jurusan;
        $dosen->save();

        // menyinkronkan data di table pivot(table dosen_kategori)
        $dosen->kategori()->sync($request->kategori);

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
        // $prodi = Prodi::where('id_jurusan', $dosen->id_jurusan)->get();
        $jurusans = Jurusan::all();
        $kategoris = Kategori::all();

        // validasi jika user id tidak di temukan ketika ingin mengedit
        if (!$dosen)
            return redirect('/dosen')->with('errors', "Dosen tidak ditemukan");
        return view('admin.dosen.edit')->with([
            'dosen' => $dosen,
            'jurusans' => $jurusans,
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDosenRequest $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required',
            'kategori' => 'required|array'
        ]);

        $dosen = Dosen::find($id);
        $dosen->nama = $request->nama;
        $dosen->id_jurusan = $request->jurusan;
        $dosen->update();

        $dosen->kategori()->sync($request->kategori);

        return redirect('/dosen');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dosen = Dosen::find($id);
        if (!$dosen)
            return redirect('/dosen')->with('errors', 'Dosen Tidak ditemukan');
        $dosen->delete();

        return redirect('/dosen');
    }
}