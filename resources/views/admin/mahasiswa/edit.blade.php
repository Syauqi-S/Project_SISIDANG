@extends('admin.layouts.app')

@section('content')
    <h4>Update Mahasiswa</h4>
    <div class="container">
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama Mahasiwa</label>
                <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama_mhs) }}" class="form-control">
                @error('nama')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>No BP</label>
                <input type="text" name="nobp" value="{{ old('nobp', $mahasiswa->no_bp) }}" class="form-control"
                    readonly>
                @error('nobp')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-control">
                    <option value="">Pilih Jurusan</option>
                    @foreach ($jurusans as $jurusan)
                        <option {{ $jurusan->id == $mahasiswa->id_jurusan ? 'selected' : '' }} value="{{ $jurusan->id }}"
                            {{ old('jurusan') == $jurusan->id ? 'selected' : '' }}>
                            {{ $jurusan->Jurusan }}</option>
                    @endforeach
                </select>
                @error('jurusan')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Prodi</label>
                <select name="prodi" id="prodi" class="form-control">
                    <option value="">Pilih Prodi</option>
                    @foreach ($prodi as $item)
                        <option {{ $item->id == $mahasiswa->id_prodi ? 'selected' : '' }} value="{{ $item->id }}">
                            {{ old('prodi') == $item->id ? 'selected' : '' }}
                            {{ $item->nama_prodi }}</option>
                    @endforeach
                </select>
                @error('prodi')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>

            <button class="btn btn-primary mt-4">Simpan</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="/jurusanProdi.js"></script>
@endsection
