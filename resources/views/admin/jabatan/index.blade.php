@extends('admin.layouts.app')

@section('content')
    <h4>Data Jabatan</h4>
    {{-- open btn tambah jabatan --}}
    <div class="d-flex">
        <div class="ms-auto">
            <a href="{{ route('jabatan.create') }}" class="btn btn-success mb-4"><i class="fas fa-plus"></i> Add Jabatan</a>
        </div>
    </div>
    {{-- menampilkan error jika jabatan id tidak ditemukan --}}
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
                    <th>Jabatan</th>
                    <th style="width: 200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($jabatans->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data yang ditemukan</td>
                    </tr>
                @else
                    @foreach ($jabatans as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>
                                <a href="{{ route('jabatan.edit', $item->id) }}" class="btn btn-sm btn-primary"
                                    class="me-5"><i class="fas fa-edit">
                                        Edit</i></a>
                                <form action="{{ route('jabatan.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger ms-3">
                                        <i class="fas fa-trash"> Delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
