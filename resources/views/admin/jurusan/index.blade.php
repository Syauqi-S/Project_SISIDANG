@extends('admin.layouts.app')

@section('content')
    <h4>Data Jurusan</h4>
    {{-- open btn tambah siswa --}}
    <div class="d-flex">
        <div class="ms-auto">
            <a href="{{ route('jurusan.create') }}" class="btn btn-success mb-4"><i class="fas fa-plus"></i> Add Jurusan</a>
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
                    <th>Jurusan</th>
                    <th style="width: 200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jurusan as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->Jurusan }}</td>
                        <td>
                            <a href="{{ route('jurusan.edit', $item->id) }}" class="btn btn-sm btn-primary"
                                class="me-5"><i class="fas fa-edit">
                                    Edit</i></a>
                            <form action="{{ route('jurusan.destroy', $item->id) }}" method="POST" class="d-inline">
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
