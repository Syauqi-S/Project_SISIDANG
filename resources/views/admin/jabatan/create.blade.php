@extends('admin.layouts.app')

@section('content')
    <h4>Tambah Jabatan</h4>
    <div class="container">
        <form action="{{ route('jabatan.store') }}" method="post">
            @csrf
            <label>Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan') }}" class="form-control">
            @error('jabatan')
                <span class="text-danger">{{ $message }}<br></span>
            @enderror
    </div>

    <button class="btn btn-primary mt-4">Tambah</button>
    </form>
    </div>
@endsection
