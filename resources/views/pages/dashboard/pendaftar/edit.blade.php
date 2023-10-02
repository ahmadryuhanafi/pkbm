@extends('layouts.dashboard') {{-- menggunakan layout admin --}}

@section('content')
    {{-- section untuk konten pada @yield --}}
    <h4 class="my-3 ">{{ $title }}</h4>
    {{-- tag untuk menangkap pesan dari controller --}}
    @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form method="post" action="{{ url('/data/update') }}/{{ $pendaftar->id }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                value="{{ old('nama', $pendaftar->nama) }}">
            @error('nama')
                <div class="invalid-feeback text-danger fst-italic">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                value="{{ old('nik', $pendaftar->nik) }}" required>
            @error('nik')
                <div class="invalid-feeback text-danger fst-italic">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nohp" class="form-label">No HP</label>
            <input type="number" class="form-control @error('nohp') is-invalid @enderror" id="nohp" name="nohp"
                value="{{ old('nohp', $pendaftar->nohp) }}">
            @error('nohp')
                <div class="invalid-feeback text-danger fst-italic">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                value="{{ old('alamat', $pendaftar->alamat) }}">
            @error('alamat')
                <div class="invalid-feeback text-danger fst-italic">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                name="tanggal_lahir" value="{{ old('tanggal_lahir', $pendaftar->tanggal_lahir) }}">
            @error('tanggal_lahir')
                <div class="invalid-feeback text-danger fst-italic">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="lulusan" class="form-label">Lulusan sebelumnya</label>
            <select class="form-select @error('lulusan_id') is-invalid @enderror" name="lulusan_id">
                @if ($lulusan->count())
                    @foreach ($lulusan as $data)
                        <option value="{{ $data->id }}"
                            {{ old('lulusan_id', $pendaftar->lulusan_id) == $data->id ? 'selected' : '' }}>
                            {{ $data->nama }}
                        </option>
                    @endforeach
                @else
                    <option value="" disabled>Belum ada data lulusan</option>
                @endif
            </select>
            @error('lulusan')
                <div class="invalid-feeback text-danger fst-italic">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis_id" class="form-label">Program</label>
            <select class="form-select @error('paket_id') is-invalid @enderror" name="jenis_id">
                @if ($programs->count())
                    @foreach ($programs as $program)
                        <option value="{{ $program->id }}"
                            {{ old('jenis_id', $pendaftar->jenis_id) == $program->id ? 'selected' : '' }}>
                            {{ $program->jenis }}
                        </option>
                    @endforeach
                @else
                    <option value="" disabled>Belum ada program</option>
                @endif
            </select>
            @error('jenis_id')
                <div class="invalid-feeback text-danger fst-italic">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success" style="width: 5.75rem;">Kirim</button>
        <a href="{{ url('data') }}" type="button" class="btn btn-secondary">Kembali</a>
    </form>
@endsection

@section('js')
    <script>
        document.getElementById("pendaftar").classList.add("active");
    </script>
@endsection
