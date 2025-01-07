@extends('admin.layouts.app')

@section('content')
    <h4>Tambah Prodi</h4>
    <div class="container">
        <form action="{{ route('prodi.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label>Nama Prodi</label>
                <input type="text" name="prodi" value="{{ old('prodi') }}" class="form-control">
                @error('prodi')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-control">
                    <option value="">Pilih Jurusan</option>
                    @foreach ($jurusans as $jurusan)
                        <option value="{{ $jurusan->id }}" {{ old('jurusan') == $jurusan->id ? 'selected' : '' }}>
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
                    <option {{ old('jenjang') === 'D2' ? 'selected' : '' }} value="D2">
                        D2</option>
                    <option {{ old('jenjang') === 'D3' ? 'selected' : '' }} value="D3">
                        D3</option>
                    <option {{ old('jenjang') === 'D4' ? 'selected' : '' }} value="D4">
                        D4</option>
                </select>
                @error('jenjang')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>

            <button class="btn btn-primary mt-4">Tambah</button>
        </form>
    </div>
@endsection
