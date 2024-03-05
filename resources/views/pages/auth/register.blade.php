@extends('layouts.auth-layout')
@section('title', 'Register');

@section('content')
    <div class="container mt-5">
        <img src="{{ asset('frontend/images/laravel-logo.png') }}" alt="logo" class="img-fluid mx-auto d-block"
            width="80px">
        <h5 class="text-center my-3">Register Page</h5>
        <form method="POST" action="{{ route('register-store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    placeholder="Email Anda">
                @error('email')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    placeholder="Nama Lengkap Anda">
                @error('name')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="username" class="form-control" id="username" name="username" value="{{ old('username') }}"
                    placeholder="Username Anda">
                @error('username')
                    <div class="form-text text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="profile" class="form-label">Photo Profile</label>
                <input type="file" class="form-control" id="profile" name="profile" value="{{ old('profile') }}">
                @error('profile')
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
                <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
            </div>
        </form>
    </div>
@endsection
