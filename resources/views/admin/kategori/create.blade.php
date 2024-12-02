@extends('admin.layouts.app')

@section('content')
    <h4>Tambah Kategori</h4>
    <div class="container">
        <form action="{{ route('kategori.store') }}" method="post">
            @csrf
            <label>Kategori</label>
            <input type="text" name="kategori" value="{{ old('kategori') }}" class="form-control">
            @error('kategori')
                <span class="text-danger">{{ $message }}<br></span>
            @enderror
    </div>

    <button class="btn btn-primary mt-4">Tambah</button>
    </form>
    </div>
@endsection
