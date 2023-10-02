@extends('layouts.index')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('content')

    <div class="row centered-content login-page">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body px-3 pb-4">
                    <div class="text-center mb-4">
                        <div class="mb-3">
                            <img src="{{ asset('image/lambang-singkawang.png') }}" width="95" alt="">
                        </div>
                        <h4 class="text-uppercase mt-0">Pendaftaran Siswa PKBM Lestari</h4>
                    </div>
                    {{-- tag untuk menangkap pesan dari controller --}}
                    @if (session()->has('success'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="post" action="/daftar-siswa">
                        @method('POST')
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feeback text-danger fst-italic">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik"
                                name="nik" value="{{ old('nik') }}" required>
                            @error('nik')
                                <div class="invalid-feeback text-danger fst-italic">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nohp" class="form-label">No HP</label>
                            <input type="number" class="form-control @error('nohp') is-invalid @enderror" id="nohp"
                                name="nohp" value="{{ old('nohp') }}">
                            @error('nohp')
                                <div class="invalid-feeback text-danger fst-italic">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
                                <div class="invalid-feeback text-danger fst-italic">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
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
                                            {{ old('lulusan_id') == $data->id ? 'selected' : '' }}>{{ $data->nama }}
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
                                            {{ old('jenis_id') == $program->id ? 'selected' : '' }}>{{ $program->jenis }}
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
                        <div class="text-center">
                            <button type="submit" class="btn btn-success w-100">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
    <a href="/" class="btn btn-danger position-absolute top-0 start-0 ms-4 mt-3 fs-6"><i class="bi bi-arrow-left"></i>
        Kembali</a>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#tanggal_lahir", {
            dateFormat: "Y-m-d"
        });
    </script>
@endsection
