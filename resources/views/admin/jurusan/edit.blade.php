@extends('admin.layouts.app')

@section('content')
    <h4>Edit Jurusan</h4>
    <div class="container">
        <form action="{{ route('jurusan.update', $jurusan->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Jurusan</label>
                <input type="text" name="jurusan" value="{{ $jurusan->Jurusan }}" class="form-control">
                @error('jurusan')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>

            <button class="btn btn-primary mt-4">Simpan</button>
        </form>

    </div>
@endsection
