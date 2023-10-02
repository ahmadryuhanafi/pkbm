@extends('layouts.dashboard')

@section('content')
    <h4 class="my-3 ">{{ $title }}</h4>
    @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table">
        <thead class="table-secondary">
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">NIK</th>
                <th scope="col">Program</th>
                <th scope="col">No HP</th>
                <th scope="col">Lulusan Sebelumnya</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($datas->count())
                @foreach ($datas as $data)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->tanggal_lahir)->isoFormat('D MMM Y') }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->program->jenis }}</td>
                        <td>{{ $data->nohp }}</td>
                        <td>{{ $data->lulusan->nama }}</td>
                        <td>
                            <a href="{{ url('/data/edit') }}/{{ $data->id }}" type="submit"
                                class="btn btn-warning">Edit</a>
                            <button type="button" class="btn btn-danger border-0 delete"
                                data-id="{{ $data->id }}">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center text-muted border-0 py-3" colspan="6">Belum ada data</td>
                </tr>
            @endif

        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $datas->links() }}
    </div>
@endsection

@section('js')
    <script>
        document.getElementById("pendaftar").classList.add("active");
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#pendaftar').addClass('active');
            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apa Anda Yakin ?',
                    text: "Data ini akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const id = $(this).data('id');
                        window.location.href = `{{ url('/data/delete') }}/${id}`;
                    }
                });
            });
        });
    </script>
@endsection
