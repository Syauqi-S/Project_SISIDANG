@extends('admin.layouts.app')

@section('content')
    <h4>Data Ruangan</h4>
    {{-- open btn tambah ruangan --}}
    <div class="d-flex">
        <div class="ms-auto">
            <a href="{{ route('ruangan.create') }}" class="btn btn-success mb-4"><i class="fas fa-plus"></i> Add Ruangan</a>
        </div>
    </div>
    {{-- menampilkan error jika ruangan id tidak ditemukan --}}
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
                    <th>Ruangan</th>
                    <th style="width: 200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($ruangans->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data yang ditemukan</td>
                    </tr>
                @else
                    @foreach ($ruangans as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->ruangan }}</td>
                            <td>
                                <a href="{{ route('ruangan.edit', $item->id) }}" class="btn btn-sm btn-primary"
                                    class="me-5"><i class="fas fa-edit">
                                        Edit</i></a>
                                <form action="{{ route('ruangan.destroy', $item->id) }}" method="POST" class="d-inline">
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
