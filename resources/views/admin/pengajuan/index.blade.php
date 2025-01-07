@extends('admin.layouts.app')

@section('content')
    <h4>Data Pengajuan</h4>
    {{-- open btn tambah siswa --}}
    <div class="d-flex">
        <div class="ms-auto">
            <a href="{{ route('pengajuan.create') }}" class="btn btn-success mb-4"><i class="fas fa-plus"></i> Ajukan
                Judul</a>
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
                    <th>Nama</th>
                    <th>Pembimbing1</th>
                    <th>Pembimbing2</th>
                    <th>Judul1</th>
                    <th>Judul2</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status</th>
                    <th style="width: 200px">Action</th>
                </tr>
            </thead>
            {{-- @dd($pengajuans->pembimbing1) --}}
            <tbody>
                @if ($pengajuans->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data yang ditemukan</td>
                    </tr>
                @else
                    @foreach ($pengajuans as $item)
                        {{-- @dd($item->pembimbing1) --}}
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->mahasiswa->nama_mhs }}</td>
                            <td>{{ $item->pembimbing_1?->nama ?? '-' }}</td>
                            <td>{{ $item->pembimbing_2?->nama ?? '-' }}</td>
                            <td>
                                {!! $item->judul1 == ''
                                    ? ' -'
                                    : $item->judul1 . '<a href="' . asset($item->dokumen1) . '"target="_blank">' . ' (Lihat Dokumen)' . '</a>' !!}
                            </td>
                            <td>
                                {!! $item->judul2 == ''
                                    ? ' -'
                                    : $item->judul2 . '<a href="' . asset($item->dokumen2) . '"target="_blank">' . ' (Lihat Dokumen)' . '</a>' !!}
                            </td>
                            <td>{{ $item->created_at->format('d F Y') }}</td>
                            <td>{!! $item->status == '0'
                                ? '<span class="badge badge-primary">Dalam Pengajuan</span>'
                                : ($item->status == '1'
                                    ? '<span class="badge badge-success">Disetujui</span>'
                                    : ($item->status == '2'
                                        ? '<span class="badge badge-danger">Ditolak</span>'
                                        : ($item->status == '3'
                                            ? '<span class="badge badge-warning">Revisi</span>'
                                            : '<span class="badge text-bg-secondary">Tidak ada Status</span>'))) !!}
                            </td>
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
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pengajuan
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-4"><strong>Nama Mahasiswa</strong></div>
                                                        <div class="col-8">: {{ $item->mahasiswa->nama_mhs }}</div>
                                                        <div class="col-4"><strong>Jurusan</strong></div>
                                                        <div class="col-8">: {{ $item->mahasiswa->jurusan->Jurusan }}
                                                        </div>
                                                        <div class="col-4"><strong>Prodi</strong></div>
                                                        <div class="col-8">: {{ $item->mahasiswa->prodi->nama_prodi }}
                                                        </div>
                                                        <div class="col-4"><strong>Jenjang</strong></div>
                                                        <div class="col-8">: {{ $item->mahasiswa->prodi->jenjang }}
                                                        </div>
                                                        <div class="col-4"><strong>NIM</strong></div>
                                                        <div class="col-8">: {{ $item->mahasiswa->no_bp }}</div>
                                                        <div class="col-4"><strong>Pembimbing1</strong></div>
                                                        <div class="col-8">:
                                                            {{ $item->pembimbing_1?->nama ?? '-' }}
                                                        </div>
                                                        <div class="col-4"><strong>Pembimbing2</strong></div>
                                                        <div class="col-8">:
                                                            {{ $item->pembimbing_2?->nama ?? '-' }}
                                                        </div>
                                                        <div class="col-4"><strong>Judul1</strong></div>
                                                        <div class="col-8">: {!! $item->judul1 == ''
                                                            ? ' -'
                                                            : $item->judul1 . '<a href="' . asset($item->dokumen1) . '"target="_blank">' . ' (Lihat Dokumen)' . '</a>' !!}</div>
                                                        <div class="col-4"><strong>Judul2</strong></div>
                                                        <div class="col-8">:
                                                            {!! $item->judul2 == ''
                                                                ? ' -'
                                                                : $item->judul2 . '<a href="' . asset($item->dokumen2) . '"target="_blank">' . ' (Lihat Dokumen)' . '</a>' !!}</div>
                                                        <div class="col-4"><strong>Diajukan Pada</strong></div>
                                                        <div class="col-8">: {{ $item->created_at->format('d F Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('pengajuan.edit', $item->id) }}" class="btn btn-sm btn-primary"
                                        class="me-5"><i class="fas fa-edit fa-lg">
                                        </i></a>
                                    <form action="{{ route('pengajuan.destroy', $item->id) }}" method="POST">
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
