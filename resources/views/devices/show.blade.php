@extends('layouts.app')

@section('title', 'Detail Perangkat')

@section('content')
    <div class="container">
        <h2>Detail Perangkat</h2>
        <p>ID: {{ $device->id }}</p>
        <p>User ID: {{ $device->user_id }}</p>
        <p>Nama: {{ $device->name }}</p>
        <a href="{{ route('devices.edit', $device->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('devices.destroy', $device->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
@endsection
