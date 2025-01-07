@extends('admin.layouts.app')

@section('content')
    <h4>Ajukan Judul</h4>
    <div class="container">
        <form action="{{ route('pengajuan.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Nama Mahasiswa</label>
                        <input type="text" name="nama_mhs" value="{{ $mahasiswa->id }}" hidden>
                        <span class="form-control-plaintext fw-bold fs-5" readonly>{{ $mahasiswa->nama_mhs }}</span>
                        @error('nama_mhs')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Nomor BP</label>
                        <input type="text" name="no_bp" value="{{ $mahasiswa->no_bp }}"
                            class="form-control-plaintext fw-bold fs-5" readonly>
                        @error('no_bp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" value="{{ $mahasiswa->jurusan->id }}" hidden>
                        <span class="form-control-plaintext fw-bold fs-5">{{ $mahasiswa->jurusan->Jurusan }}</span>
                        @error('jurusan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Prodi</label>
                        <input type="text" name="prodi" value="{{ $mahasiswa->prodi->nama_prodi }}"
                            class="form-control-plaintext fw-bold fs-5" readonly>
                        @error('prodi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label>Kategori Penelitian</label>
                <select name="kategori" id="kategories" class="form-control" value="">
                    <option value="">Pilih Kategori</option>
                </select>
                @error('kategori')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Judul 1</label>
                <input type="text" name="judul1" value="{{ old('judul1') }}" class="form-control">
                @error('judul1')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Dokumen Judul 1</label>
                <input type="file" name="dokumen1" value="{{ old('dokumen1') }}" class="form-control"
                    accept=".pdf,.doc,.docx">
                @error('dokumen1')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Judul 2 <span class="text-primary">(Opsional)</span></label>
                <input type="text" name="judul2" value="{{ old('judul2') }}" class="form-control">
                @error('judul2')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Dokumen Judul 2 <span class="text-primary">(Opsional)</span></label>
                <input type="file" name="dokumen2" value="{{ old('dokumen2') }}" class="form-control"
                    accept=".pdf,.doc,.docx">
                @error('dokumen2')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>

            <button class="btn btn-primary mt-4">Ajukan</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="/kategoriJurusan.js"></script>
@endsection
