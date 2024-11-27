@extends('admin.layouts.app')

@section('content')
    <h4>Tambah User</h4>
    <div class="container">
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                @error('email')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="">Pilih role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                            {{ $role->role }}</option>
                    @endforeach
                </select>
                @error('role')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>

            <button class="btn btn-primary mt-4">Tambah</button>
        </form>
    </div>
@endsection
