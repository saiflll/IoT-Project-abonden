@extends('layouts.app')

@section('content')
    <h1>Edit Config Heater</h1>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="{{ route('config_heater.update', $configHeater->id) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="mode">Mode:</label>
            <input type="text" id="mode" name="mode" value="{{ $configHeater->mode }}" required>
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="1" @if ($configHeater->status == 1) selected @endif>On</option>
                <option value="0" @if ($configHeater->status == 0) selected @endif>Off</option>
            </select>
        </div>
        <div>
            <label for="max_temp">Max Temperature:</label>
            <input type="number" id="max_temp" name="max_temp" value="{{ $configHeater->max_temp }}" required>
        </div>
        <div>
            <label for="min_temp">Min Temperature:</label>
            <input type="number" id="min_temp" name="min_temp" value="{{ $configHeater->min_temp }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
