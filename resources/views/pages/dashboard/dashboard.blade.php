@extends('layouts.main-layout')
@section('title', 'Dashboard')

@section('content')
    <div class="container mt-3">
        <div class="card p-2">
            <form action="{{ route('store-task') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Nama Task</label>
                    <input type="title" class="form-control" id="title" name="title" value="{{ old('title') }}"
                        placeholder="Nama Task Anda">
                    @error('title')
                        <div class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Deskripsi" rows="5">{{ old('description') }}</textarea>
                    @error('title')
                        <div class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Buat Task</button>
                </div>
            </form>
        </div>

        <div class="row justify-content-start my-3">
            @forelse ($items as $item)
                <div class="col-4">
                    <div class="card my-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">
                                {{ Str::limit($item->description, 30, '...') }}
                            </p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <span class="badge text-bg-{{ $item->status == 0 ? 'secondary' : 'success' }}">
                                    {{ $item->status === 0 ? 'Belum Selesai' : 'Selesai' }}
                                </span>
                                <a href="{{ route('edit-task', $item->id) }}"
                                    class="badge text-bg-primary text-decoration-none">Edit</a>
                                <a href="{{ route('delete-task', $item->id) }}"
                                    class="badge text-bg-danger text-decoration-none" data-confirm-delete="true">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h6 class="text-center text-danger">
                    Anda Belum Menambahkan Task Apapun
                </h6>
            @endforelse
            <div class="row mt-3">
                <div class="float-end">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
