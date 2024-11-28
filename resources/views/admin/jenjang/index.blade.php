@extends('admin.layouts.app')

@section('content')
    <h4>Data Jenjang</h4>
    {{-- open btn tambah siswa --}}
    <div class="d-flex">
        <div class="ms-auto">
            <a href="{{ route('jenjang.create') }}" class="btn btn-success mb-4"><i class="fas fa-plus"></i> Add Jenjang</a>
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
                    <th>Nama Jenjang</th>
                    <th style="width: 200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($jenjang->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data yang ditemukan</td>
                    </tr>
                @else
                    @foreach ($jenjang as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->nama_jenjang }}</td>
                            <td>
                                <a href="{{ route('jenjang.edit', $item->id) }}" class="btn btn-sm btn-primary"
                                    class="me-5"><i class="fas fa-edit">
                                        Edit</i></a>
                                <form action="{{ route('jenjang.destroy', $item->id) }}" method="POST" class="d-inline">
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
