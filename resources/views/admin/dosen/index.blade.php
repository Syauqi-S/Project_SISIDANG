@extends('admin.layouts.app')

@section('content')
    <h4>Data Dosen</h4>
    {{-- open btn tambah siswa --}}
    <div class="d-flex">
        <div class="ms-auto">
            <a href="{{ route('dosen.create') }}" class="btn btn-success mb-4"><i class="fas fa-plus"></i> Add
                Dosen</a>
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
                    <th>NIDN</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Prodi</th>
                    <th style="width: 200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dosens as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->nidn }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jurusan->Jurusan }}</td>
                        <td>{{ $item->prodi->nama_prodi }}</td>
                        <td>
                            <a href="{{ route('dosen.edit', $item->id) }}" class="btn btn-sm btn-primary" class="me-5"><i
                                    class="fas fa-edit">
                                    Edit</i></a>
                            <form action="{{ route('dosen.destroy', $item->id) }}" method="POST" class="d-inline">
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
