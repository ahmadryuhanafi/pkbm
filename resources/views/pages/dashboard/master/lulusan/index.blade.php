@extends('layouts.dashboard')

@section('content')
    <h4 class="my-3 ">{{ $title }}</h4>
    <a href="/lulusan/tambah" type="button" class="btn btn-primary my-3"><i class="bi bi-clipboard-plus"></i> Tambah
        lulusan</a>

    @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table ">
        <thead class="table-secondary">
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nama Program</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @if ($data->count())
                @foreach ($data as $lulusan)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lulusan->nama }}</td>
                        <td>{{ $lulusan->deskripsi }}</td>
                        <td>
                            <a href="{{ url('lulusan/edit') }}/{{ $lulusan->id }}" class="btn btn-warning">Edit</a>
                            <button type="button" class="btn btn-danger border-0 delete" data-id="{{ $lulusan->id }}"
                                {{ count($lulusan->pendaftars) > 0 ? 'disabled' : '' }}>Hapus</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center text-muted border-0 py-3" colspan="6">Belum ada program</td>
                </tr>
            @endif

        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $data->links() }}
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#lulusan').addClass('active');
            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const id = $(this).data('id');
                        window.location.href = `{{ url('/lulusan/delete') }}/${id}`;
                    }
                });
            });
        });
    </script>
@endsection
