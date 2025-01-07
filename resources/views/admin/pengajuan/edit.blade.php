@extends('admin.layouts.app')

@section('content')
    <h4>Ajukan Judul</h4>
    <div class="container">
        <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="post">
            @csrf
            @method('PUT')
            {{-- @dd($pengajuan->id_kategori) --}}
            {{-- @dd($pengajuan) --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Nama Mahasiswa</label>
                        <input type="text" name="nama_mhs" value="{{ $mahasiswa->nama_mhs }}"
                            class="form-control-plaintext fw-bold fs-5" readonly>
                        @error('nama_mhs')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Nomor BP</label>
                        <input type="text" name="no_bp" value="{{ $mahasiswa->no_bp }}"
                            class="form-control-plaintext fw-bold fs-5" readonly>
                        @error('no_bp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" value="{{ $mahasiswa->jurusan->id }}" hidden>
                        <span class="form-control-plaintext fw-bold fs-5">{{ $mahasiswa->jurusan->Jurusan }}</span>
                        @error('jurusan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Prodi</label>
                        <input type="text" name="prodi" value="{{ $mahasiswa->prodi->nama_prodi }}"
                            class="form-control-plaintext fw-bold fs-5" readonly>
                        @error('prodi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori" id="kategories" class="form-control" disabled>
                    <option value="" disabled>Pilih Kategori</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}"
                            {{ old('kategori', $pengajuan->id_kategori) == $item->id ? 'selected' : '' }}>
                            {{-- {{ $item->id }}
                            - --}}
                            {{ $item->kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label>Kategori Penelitian</label>
                <select name="kategori" id="kategories" class="form-control">
                    <option value="">Pilih Kategori</option>
                </select>
                @error('kategori')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div> --}}
            <div class="mb-3">
                <label>Judul 1</label>
                <input type="text" name="judul1" value="{{ old('judul1', $pengajuan->judul1) }}" class="form-control"
                    disabled>
                @error('judul1')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="mb-2">Dokumen Judul 1</label>
                <br><a href="{{ asset($pengajuan->dokumen1) }}" target="_blank" class="btn btn-primary btn-sm">
                    Tampilkan Dokumen
                </a>
                @error('dokumen1')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>

            @if ($pengajuan->judul2)
                <div class="mb-3">
                    <label>Judul 2 <span class="text-primary">(Opsional)</span></label>
                    <input type="text" name="judul2" value="{{ old('judul2', $pengajuan->judul2) }}"
                        class="form-control" disabled>
                    @error('judul2')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="mb-2">Dokumen Judul 2</label>
                    <br><a href="{{ asset($pengajuan->dokumen2) }}" target="_blank" class="btn btn-primary btn-sm">
                        Tampilkan Dokumen
                    </a>
                    @error('dokumen2')
                        <span class="text-danger">{{ $message }}<br></span>
                    @enderror
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Pembimbing 1</label>
                        <select name="pembimbing1" id="pembimbing1" class="form-control">
                            <option value="">Pilih Pembimbing1</option>
                        </select>
                        @error('pembimbing1')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Pembimbing 2</label>
                        <select name="pembimbing2" id="pembimbing2" class="form-control">
                            <option value="">Pilih Pembimbing2</option>
                        </select>
                        @error('pembimbing2')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label>Status</label>
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="statusTerima" value="1" checked>
                    <label class="form-check-label" for="statusTerima">Terima</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="statusTolak" value="2">
                    <label class="form-check-label" for="statusTolak">Tolak</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="statusRevisi" value="3">
                    <label class="form-check-label" for="statusRevisi">Revisi</label>
                </div>
            </div>

            <button class="btn btn-primary mt-4">Selesai</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    {{-- <script src="/kategoriJurusan.js"></script> --}}
    <script>
        // Ambil elemen dropdown
        const kategoriDropdown = document.getElementById('kategories');

        // Nilai id_kategori dari pengajuan
        const selectedKategoriId = {{ $pengajuan->id_kategori }};

        // Cari opsi yang sesuai dengan id_kategori
        for (let i = 0; i < kategoriDropdown.options.length; i++) {
            if (parseInt(kategoriDropdown.options[i].value) === selectedKategoriId) {
                kategoriDropdown.options[i].selected = true;
                break;
            }
        }
    </script>

    <script src="/dosenKategori.js"></script>
@endsection
