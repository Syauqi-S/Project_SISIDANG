@extends('admin.layouts.app')

@section('content')
    <h4>Update Dosen</h4>
    <div class="container">
        <form action="{{ route('dosen.update', $dosen->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>NIDN</label>
                <input type="text" readonly class="form-control-plaintext" name="nidn"
                    value="{{ old('nidn', $dosen->nidn) }}">
                @error('nidn')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>NIP</label>
                <input type="text" readonly class="form-control-plaintext" name="nip"
                    value="{{ old('nip', $dosen->nip) }}">
                @error('nip')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Nama Dosen</label>
                <input type="text" name="nama" value="{{ old('nama', $dosen->nama) }}" class="form-control">
                @error('nama')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label>Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-control">
                    <option value="">Pilih Jurusan</option>
                    @foreach ($jurusans as $jurusan)
                        <option {{ $jurusan->id == $dosen->id_jurusan ? 'selected' : '' }} value="{{ $jurusan->id }}"
                            {{ old('jurusan') == $jurusan->id ? 'selected' : '' }}>
                            {{ $jurusan->Jurusan }}</option>
                    @endforeach
                </select>
                @error('jurusan')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kategori">Kategori(Keahlian)</label>
                <select name="kategori[]" id="kategori" class="form-control" multiple>
                    @php
                        $selectedKategori = old('kategori', $dosen->kategori->pluck('id')->toArray() ?? []);
                        if (!is_array($selectedKategori)) {
                            $selectedKategori = [];
                        }
                    @endphp
                    @foreach ($kategoris as $item)
                        <option value="{{ $item->id }}"
                            {{ in_array($item->id, $selectedKategori) ? 'selected' : '' }}>
                            {{ $item->kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori')
                    <span class="text-danger">{{ $message }}<br></span>
                @enderror
            </div>

            <button class="btn btn-primary mt-4">Simpan</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#kategori').select2({
                placeholder: 'Pilih kategori keahlian',
                allowClear: true,
                width: '100%'
            });
        });
    </script>
@endsection
