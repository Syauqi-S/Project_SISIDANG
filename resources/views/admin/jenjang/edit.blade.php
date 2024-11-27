@extends('admin.layouts.app')

@section('content')
    <h4>Edit Jenjang</h4>
    <div class="container">
        <form action="{{ route('jenjang.update', $jenjang->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Jenjang</label>
                <input type="text" name="jenjang" value="{{ $jenjang->nama_jenjang }}" class="form-control">
                @error('jenjang')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>

            <button class="btn btn-primary mt-4">Simpan</button>
        </form>

    </div>
@endsection
