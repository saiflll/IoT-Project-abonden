@extends('layouts.app')

@section('title', 'Edit Perangkat')

@section('content')
    <div class="container">
        <h2>Edit Perangkat</h2>
        <form action="{{ route('devices.update', $device->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $device->name }}" required>
                <div class="invalid-feedback">
                    Masukkan nama perangkat.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
