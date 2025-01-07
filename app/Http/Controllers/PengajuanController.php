<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Kategori;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuans = Pengajuan::all();
        return view("admin.pengajuan.index")->with('pengajuans', $pengajuans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $kategoris = Kategori::all();
        $mahasiswa = Mahasiswa::first();
        return view("admin.pengajuan.create")->with([
            // 'kategoris' => $kategoris,
            'mahasiswa' => $mahasiswa
        ]);

    }

    // public function getKategoriByJurusan($jurusan_id)
    // {
    //     $kategoris = Kategori::whereHas('dosens', function ($query) use ($jurusan_id) {
    //         $query->where('id_jurusan', $jurusan_id);
    //     })->get();

    //     return response()->json([
    //         "success" => true,
    //         "msg" => "Successfully retrieved categories",
    //         "data" => $kategoris
    //     ], 200);
    // }

    // public function getDosenByJurusanAndKategori($jurusan_id, $kategori_id)
    // {
    //     $dosens = Dosen::where('id_jurusan', $jurusan_id)
    //         ->whereHas('kategoris', function ($query) use ($kategori_id) {
    //             $query->where('kategori_id', $kategori_id);
    //         })->get();

    //     return response()->json([
    //         "success" => true,
    //         "msg" => "Successfully retrieved lecturers",
    //         "data" => $dosens
    //     ], 200);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePengajuanRequest $request)
    {
        $request->validate([

            'kategori' => 'required',
            'judul1' => 'required',
            'dokumen1' => 'required|max:10000',
            'judul2' => 'nullable',
            'dokumen2' => 'nullable|max:10000'
        ]);

        $pengajuan = new Pengajuan();
        $pengajuan->id_mhs = $request->nama_mhs;
        $pengajuan->judul1 = $request->judul1;
        $pengajuan->judul2 = $request->judul2;
        $pengajuan->id_kategori = $request->kategori;
        $dokumen1 = $request->file('dokumen1');
        $dokumen2 = $request->file('dokumen2');
        if ($dokumen1) {
            $filename = time() . "-" . $dokumen1->getClientOriginalName();
            $filePath = $dokumen1->move(public_path("pengajuandoc"), $filename);
            $pengajuan->dokumen1 = "/pengajuandoc/" . $filename;
        }
        if ($dokumen2) {
            $filename = time() . "-" . $dokumen2->getClientOriginalName();
            $filePath = $dokumen2->move(public_path("pengajuandoc"), $filename);
            $pengajuan->dokumen2 = "/pengajuandoc/" . $filename;
        }

        $pengajuan->save();
        return redirect('/pengajuan')->with('success', 'Pengajuan berhasil disimpan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengajuan = Pengajuan::find($id);
        $mahasiswa = Mahasiswa::first();
        $kategori = Kategori::where('id_jurusan', $mahasiswa->id_jurusan)->get();
        return view("admin.pengajuan.edit")->with([
            'pengajuan' => $pengajuan,
            'kategori' => $kategori,
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengajuanRequest $request, $id)
    {
        $request->validate([
            'pembimbing1' => 'required',
            'pembimbing2' => 'required',
            'status' => 'required'
        ]);

        $pengajuan = Pengajuan::find($id);
        $pengajuan->pembimbing1 = $request->pembimbing1;
        $pengajuan->pembimbing2 = $request->pembimbing2;
        $pengajuan->status = $request->status;
        $pengajuan->update();

        return redirect('/pengajuan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengajuan = Pengajuan::find($id);
        if (!$pengajuan)
            return redirect('/pengajuan')->with('errors', 'Pengajuan tidak ditemukan');
        $pengajuan->delete();

        return redirect('/pengajuan');
    }
}