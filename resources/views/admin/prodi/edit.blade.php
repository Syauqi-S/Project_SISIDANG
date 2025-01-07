@extends('admin.layouts.app')

@section('content')
    <h4>Edit Prodi</h4>
    <div class="container">
        <form action="{{ route('prodi.update', $prodi->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama Prodi</label>
                <input type="text" name="prodi" value="{{ $prodi->nama_prodi }}" class="form-control">
                @error('prodi')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-control">
                    <option value="">Pilih Jurusan</option>
                    @foreach ($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}"
                            {{ old('jurusan', $prodi->id_jurusan) == $jurusan->id ? 'selected' : '' }}>
                            {{ $jurusan->Jurusan }}</option>
                    @endforeach
                </select>
                @error('jurusan')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Jenjang</label>
                <select name="jenjang" id="jenjang" class="form-control">
                    <option value="">Pilih Jenjang</option>
                    <option value="D2" {{ old('jenjang', $prodi->jenjang) === 'D2' ? 'selected' : '' }}>
                        D2</option>
                    <option value="D3" {{ old('jenjang', $prodi->jenjang) === 'D3' ? 'selected' : '' }}>
                        D3</option>
                    <option value="D4" {{ old('jenjang', $prodi->jenjang) === 'D4' ? 'selected' : '' }}>
                        D4</option>
                </select>
                @error('jenjang')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>

            <button class="btn btn-primary mt-4">Simpan</button>
        </form>

    </div>
@endsection
