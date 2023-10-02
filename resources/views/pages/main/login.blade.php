@extends('layouts.index')
@section('content')
    <div class="login-page d-flex flex-column">
        <div class="row vh-100 centered-content">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="align-middle">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <div class="mb-3">
                                    <img src="{{ asset('image/lambang-singkawang.png') }}" width="95" alt="">
                                </div>
                                <h4 class="text-uppercase mt-6">Login Admin PKBM Lestari</h4>
                            </div>
                            <div class="invalid_message"></div>
                            <form method="POST" action="/login-proses">
                                @if (session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        value="{{ old('email') }}">
                                    <label for="email">Email</label>
                                    @error('email')
                                        <div class="invalid-feeback text-danger fst-italic">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        value="{{ old('password') }}">
                                    <label for="password">Password</label>
                                    @error('password')
                                        <div class="invalid-feeback text-danger fst-italic">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection
