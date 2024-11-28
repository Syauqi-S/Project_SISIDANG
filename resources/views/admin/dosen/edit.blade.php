@extends('admin.layouts.app')

@section('content')
    <h4>Update Dosen</h4>
    <div class="container">
        <form action="{{ route('dosen.update', $dosen->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>NIDN</label>
                <input type="text" name="nidn" value="{{ old('nidn', $dosen->nidn) }}" class="form-control" readonly>
                @error('nidn')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" value="{{ old('nip', $dosen->nip) }}" class="form-control" readonly>
                @error('nip')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Nama Dosen</label>
                <input type="text" name="nama" value="{{ old('nama', $dosen->nama) }}" class="form-control">
                @error('nama')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-control">
                    <option value="">Pilih Jurusan</option>
                    @foreach ($jurusans as $jurusan)
                        <option {{ $jurusan->id == $dosen->id_jurusan ? 'selected' : '' }} value="{{ $jurusan->id }}"
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
                        <option {{ $item->id == $dosen->id_prodi ? 'selected' : '' }} value="{{ $item->id }}">
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
