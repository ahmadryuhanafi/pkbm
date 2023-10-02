@extends('layouts.dashboard')

@section('content')
    <h4 class="my-3 ">{{ $title }}</h4>
    @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form method="post" action="/program/update/{{ $program->id }}" class="col-md-6">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="jenis" class="form-label">Program</label>
            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis"
                value="{{ old('jenis', $program->jenis) }}">
            @error('jenis')
                <div class="invalid-feeback text-danger fst-italic">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ url('program') }}" type="button" class="btn btn-secondary">Kembali</a>
    </form>
@endsection

@section('js')
    <script>
        document.getElementById("program").classList.add("active");
    </script>
@endsection
