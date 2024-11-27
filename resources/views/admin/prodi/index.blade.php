@extends('admin.layouts.app')

@section('content')
    <h4>Data Prodi</h4>
    {{-- open btn tambah siswa --}}
    <div class="d-flex">
        <div class="ms-auto">
            <a href="{{ route('prodi.create') }}" class="btn btn-success mb-4"><i class="fas fa-plus"></i> Add Prodi</a>
        </div>
    </div>
    {{-- menampilkan error jika user id tidak ditemukan --}}
    @if (session('errors'))
        <div class="alert alert-danger text-danger">
            {{ session('errors') }}
        </div>
    @endif

    {{-- close btn tambah siswa --}}
    <div class="container" style="display: grid; place-content: center">
        <table class="table" style="width: 1100px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Prodi</th>
                    <th>Jurusan</th>
                    <th>Jenjang</th>
                    <th style="width: 200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prodis as $prodi)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $prodi->nama_prodi }}</td>
                        <td>{{ $prodi->jurusan->Jurusan }}</td>
                        <td>{{ $prodi->jenjang->nama_jenjang }}</td>
                        <td>
                            <a href="{{ route('prodi.edit', $prodi->id) }}" class="btn btn-sm btn-primary" class="me-5"><i
                                    class="fas fa-edit">
                                    Edit</i></a>
                            <form action="{{ route('prodi.destroy', $prodi->id) }}" method="POST" class="d-inline">
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
