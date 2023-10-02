@extends('layouts.dashboard')

@section('content')
    <h4 class="my-3 ">{{ $title }}</h4>
    <a href="/program/tambah" type="button" class="btn btn-primary my-3"><i class="bi bi-clipboard-plus"></i> Tambah jenis
        program</a>

    @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @php(Session::forget('success'))
        </div>
    @endif
    <table class="table ">
        <thead class="table-secondary">
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Nama Program</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @if ($programs->count())
                @foreach ($programs as $program)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $program->jenis }}</td>
                        <td>
                            <a href="{{ url('program/edit') }}/{{ $program->id }}" class="btn btn-warning">Edit</a>
                            <button type="submit" class="btn btn-danger border-0 delete" data-id="{{ $program->id }}"
                                {{ count($program->pendaftars) > 0 ? 'disabled' : '' }}>Hapus</button>
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
        {{ $programs->links() }}
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#program').addClass('active');
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
                        window.location.href = `{{ url('/program/delete') }}/${id}`;
                    }
                });
            });
        });
    </script>
@endsection
