@extends('admin.layouts.app')

@section('content')
    <h4>Edit Jabatan</h4>
    <div class="container">
        <form action="{{ route('jabatan.update', $jabatan->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Jabatan</label>
                <input type="text" name="jabatan" value="{{ $jabatan->jabatan }}" class="form-control">
                @error('jabatan')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>

            <button class="btn btn-primary mt-4">Simpan</button>
        </form>

    </div>
@endsection
