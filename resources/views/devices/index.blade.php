@extends('layouts.app')

@section('title', 'Daftar Perangkat')

@section('content')
    <div class="container">
        <h2>Daftar Perangkat</h2>
        <a class="btn btn-primary mb-3" href="{{ route('devices.create') }}">Tambah Perangkat Baru</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devices as $device)
                    <tr>
                        <td>{{ $device->id }}</td>
                        <td>{{ $device->name }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('devices.show', $device->id) }}">Lihat</a>
                            <a class="btn btn-warning btn-sm" href="{{ route('devices.edit', $device->id) }}">Edit</a>
                            <form action="{{ route('devices.destroy', $device->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
