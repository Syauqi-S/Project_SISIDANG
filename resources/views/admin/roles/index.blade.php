@extends('admin.layouts.app')

@section('content')
    <h4>Data Roles</h4>
    {{-- open btn tambah siswa --}}
    <div class="d-flex">
        <div class="ms-auto">
            <a href="{{ route('roles.create') }}" class="btn btn-success mb-4"><i class="fas fa-plus"></i> Add Role</a>
        </div>
    </div>
    {{-- menampilkan error jika user id tidak ditemukan --}}
    @if (session('errors'))
        <div class="alert alert-danger text-danger">
            {{ session('errors') }}
        </div>
    @endif

    <div class="container" style="display: grid; place-content: center">
        <table class="table" style="width: 1100px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Role Name</th>
                    {{-- Jumlah akun dengan role yang menggunakan role tersebut --}}
                    <th>Jumlah Akun</th>
                    {{-- Mengaktifkan auto deactive --}}
                    {{-- <th>Auto Deactive</th> --}}
                    <th style="width: 200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        {{-- @dd($role->account ) --}}
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $role->role }}</td>
                        <td>{{ $role->getCount() }}</td>
                        <td>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-primary" class="me-5"><i
                                    class="fas fa-edit">
                                    Edit</i></a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger ms-3">
                                    <i class="fas fa-trash"> Delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
