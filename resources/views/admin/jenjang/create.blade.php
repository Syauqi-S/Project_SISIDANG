@extends('admin.layouts.app')

@section('content')
    <h4>Tambah Jenjang</h4>
    <div class="container">
        <form action="{{ route('jenjang.store') }}" method="post">
            @csrf
            <label>Jenjang</label>
            <input type="text" name="jenjang" value="{{ old('jenjang') }}" class="form-control">
            @error('jenjang')
                <span class="text-danger">{{ $message }}<br></span>
            @enderror
    </div>

    <button class="btn btn-primary mt-4">Tambah</button>
    </form>
    </div>
@endsection
