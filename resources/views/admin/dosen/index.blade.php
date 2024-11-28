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
                @if ($dosens->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data yang ditemukan</td>
                    </tr>
                @else
                    @foreach ($dosens as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->nidn }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jurusan->Jurusan }}</td>
                            <td>{{ $item->prodi->nama_prodi }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modal-detail-{{ $item->index }}">
                                        <i class="fas fa-info-circle fa-lg">
                                        </i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-detail-{{ $item->index }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Dosen</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-4"><strong>NIDN</strong></div>
                                                        <div class="col-8">: {{ $item->nidn }}</div>
                                                        <div class="col-4"><strong>NIP</strong></div>
                                                        <div class="col-8">: {{ $item->nip }}</div>
                                                        <div class="col-4"><strong>Nama</strong></div>
                                                        <div class="col-8">: {{ $item->nama }}</div>
                                                        <div class="col-4"><strong>Jurusan</strong></div>
                                                        <div class="col-8">: {{ $item->jurusan->Jurusan }}</div>
                                                        <div class="col-4"><strong>Prodi</strong></div>
                                                        <div class="col-8">: {{ $item->prodi->nama_prodi }}</div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('dosen.edit', $item->id) }}" class="btn btn-sm btn-primary"
                                        class="me-5"><i class="fas fa-edit fa-lg">
                                        </i></a>
                                    <form action="{{ route('dosen.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
