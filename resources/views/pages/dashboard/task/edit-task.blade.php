@extends('layouts.main-layout')
@section('title', 'Edit Task')

@section('content')
    <div class="container mt-3">
        <div class="card p-2">
            <form action="{{ route('update-task', $task->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Nama Task</label>
                    <input type="title" class="form-control" id="title" name="title"
                        value="{{ old('title', $task->title) }}" placeholder="Nama Task Anda">
                    @error('title')
                        <div class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Deskripsi" rows="5">{{ old('description', $task->description) }}</textarea>
                    @error('title')
                        <div class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option selected disabled value="{{ $task->status == 0 ? '0' : '1' }}">
                            {{ $task->status === 0 ? 'Belum Selesai' : 'Selesai' }} (Status Task Saat Ini)
                        </option>
                        <option value="0">Belum Selesai</option>
                        <option value="1">Selesai</option>
                    </select>
                    @error('status')
                        <div class="form-text text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Update Task</button>
                </div>
            </form>
        </div>
    </div>
@endsection
