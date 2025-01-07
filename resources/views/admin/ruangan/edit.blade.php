@extends('admin.layouts.app')

@section('content')
    <h4>Edit Ruangan</h4>
    <div class="container">
        <form action="{{ route('ruangan.update', $ruangan->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Ruangan</label>
                <input type="text" name="ruangan" value="{{ $ruangan->ruangan }}" class="form-control">
                @error('ruangan')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>

            <button class="btn btn-primary mt-4">Simpan</button>
        </form>

    </div>
@endsection
