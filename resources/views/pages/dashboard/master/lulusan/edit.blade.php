@extends('layouts.dashboard')

@section('content')
    <h4 class="my-3 ">{{ $title }}</h4>
    @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="">
        <form method="post" action="/lulusan/update/{{ $lulusan->id }}" class="col-md-6">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ old('nama', $lulusan->nama) }}">
                @error('nama')
                    <div class="invalid-feeback text-danger fst-italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Program</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi', $lulusan->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feeback text-danger fst-italic">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ url('lulusan') }}" type="button" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

@section('js')
    <script>
        document.getElementById("lulusan").classList.add("active");
    </script>
@endsection
