<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Jurusan;
use App\Models\Jenjang;
use App\Http\Requests\StoreProdiRequest;
use App\Http\Requests\UpdateProdiRequest;


class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis = Prodi::with(['jurusan','jenjang'])->get();
        return view("admin.prodi.index")->with('prodis', $prodis);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        $jenjangs = Jenjang::all();
        return view("admin.prodi.create")->with('jurusans',$jurusans)->with('jenjangs',$jenjangs);
    }

    // Function untuk mengambil data prodi berdasarkan id jurusan dalam bentuk json
    public function  getProdiJurusan($jurusan_id){
        $prodiJurusan = Prodi::where('id_jurusan',$jurusan_id)->get();
        // log json jika data berhasil di terima
        return response()->json([
           "success"=>true,
           "msg"=> "successfully get data",
           "data"=> $prodiJurusan
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdiRequest $request)
    {
        $request->validate([
            'prodi' => 'required',
            'jurusan' => 'required',
            'jenjang' => 'required'
        ]);

        $prodi = new Prodi();
        $prodi->nama_prodi = $request->prodi;
        $prodi->id_jurusan = $request->jurusan;
        $prodi->id_jenjang = $request->jenjang;
        $prodi->save();

        return redirect('/prodi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $prodi = Prodi::find($id);
        $jurusans = Jurusan::all();
        $jenjangs = Jenjang::all();
        
        // validasi jika user id tidak di temukan ketika ingin mengedit
        if (!$prodi) return redirect('/prodi')->with('errors', "Prodi tidak ditemukan");
        return view('admin.prodi.edit')->with([
            'prodi'=> $prodi,
            'jurusans' => $jurusans,
            'jenjangs' => $jenjangs
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdiRequest $request, $id)
    {

        $request->validate([
            'prodi' => 'required',
            'jurusan' => 'required',
            'jenjang' => 'required'
        ]);

        $prodi = Prodi::find($id);
        $prodi->nama_prodi = $request->prodi;
        $prodi->id_jurusan = $request->jurusan;
        $prodi->id_jenjang = $request->jenjang;
        $prodi->update();

        return redirect('/prodi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prodi = Prodi::find($id);

    if (!$prodi) return redirect('/prodi')->with('errors', "Prodi tidak ditemukan");
        $prodi->delete();

        return redirect('/prodi'); 
    }
}