@extends('admin.layouts.app')

@section('content')
    <h4>Tambah Kategori</h4>
    <div class="container">
        <form action="{{ route('kategori.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label>Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori') }}" class="form-control">
                @error('kategori')
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

            <button class="btn btn-primary mt-4">Tambah</button>
        </form>
    </div>
@endsection
