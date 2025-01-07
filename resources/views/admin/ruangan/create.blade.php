@extends('admin.layouts.app')

@section('content')
    <h4>Tambah Ruangan</h4>
    <div class="container">
        <form action="{{ route('ruangan.store') }}" method="post">
            @csrf
            <label>Ruangan</label>
            <input type="text" name="ruangan" value="{{ old('ruangan') }}" class="form-control">
            @error('ruangan')
                <span class="text-danger">{{ $message }}<br></span>
            @enderror
    </div>

    <button class="btn btn-primary mt-4">Tambah</button>
    </form>
    </div>
@endsection
