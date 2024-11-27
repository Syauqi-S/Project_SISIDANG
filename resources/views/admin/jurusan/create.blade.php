@extends('admin.layouts.app')

@section('content')
    <h4>Tambah Jurusan</h4>
    <div class="container">
        <form action="{{ route('jurusan.store') }}" method="post">
            @csrf
            <label>Jurusan</label>
            <input type="text" name="jurusan" value="{{ old('jurusan') }}" class="form-control">
            @error('jurusan')
                <span class="text-danger">{{ $message }}<br></span>
            @enderror
    </div>

    <button class="btn btn-primary mt-4">Tambah</button>
    </form>
    </div>
@endsection
