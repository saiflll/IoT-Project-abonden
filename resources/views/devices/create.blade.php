@extends('layouts.app')

@section('title', 'Tambah Perangkat')

@section('content')
    <div class="container">
        <h2>Tambah Perangkat</h2>
        <form action="{{ route('devices.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <div class="invalid-feedback">
                    Masukkan nama perangkat.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
