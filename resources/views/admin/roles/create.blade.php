@extends('admin.layouts.app')

@section('content')
    <h4>Tambah Role</h4>
    <div class="container">
        <form action="{{ route('roles.store') }}" method="post">
            @csrf
            <label>Role Name</label>
            <input type="text" name="role" value="{{ old('role') }}" class="form-control">
            @error('role')
                <span class="text-danger">{{ $message }}<br></span>
            @enderror
    </div>

    <button class="btn btn-primary mt-4">Tambah</button>
    </form>
    </div>
@endsection
