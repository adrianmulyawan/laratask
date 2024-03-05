@extends('layouts.auth-layout')
@section('title', 'Login')

@section('content')
    <div class="container mt-5">
        <img src="{{ asset('frontend/images/laravel-logo.png') }}" alt="logo" class="img-fluid mx-auto d-block"
            width="80px">
        <h5 class="text-center my-3">Login Page</h5>
        <form method="POST" action="{{ route('login-store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="username" class="form-control" id="username" name="username" value="{{ old('username') }}"
                    placeholder="username Anda">
                @error('username')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}"
                    placeholder="password">
                @error('password')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
@endsection
