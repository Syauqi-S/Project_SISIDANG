@extends('admin.layouts.app')

@section('content')
    <h4>Edit Role</h4>
    <div class="container">
        <form action="{{ route('roles.update', $role->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Role Name</label>
                <input type="text" name="role" value="{{ $role->roles }}" class="form-control">
                @error('role')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>

            <button class="btn btn-primary mt-4">Simpan</button>
        </form>

    </div>
@endsection
