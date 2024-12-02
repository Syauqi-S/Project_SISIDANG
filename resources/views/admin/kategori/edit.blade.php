@extends('admin.layouts.app')

@section('content')
    <h4>Edit Kategori</h4>
    <div class="container">
        <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Kategori</label>
                <input type="text" name="kategori" value="{{ $kategori->kategori }}" class="form-control">
                @error('kategori')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>

            <button class="btn btn-primary mt-4">Simpan</button>
        </form>

    </div>
@endsection
