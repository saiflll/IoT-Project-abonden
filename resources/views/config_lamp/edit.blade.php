@extends('layouts.app')

@section('content')
    <h1>Edit Config Lamp</h1>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <form action="{{ route('config_lamp.update', $configLamp->id) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="1" @if ($configLamp->status == 1) selected @endif>On</option>
                <option value="0" @if ($configLamp->status == 0) selected @endif>Off</option>
            </select>
        </div>
        <div>
            <label for="time_on">Time On:</label>
            <input type="text" id="time_on" name="time_on" value="{{ $configLamp->time_on }}" required>
        </div>
        <div>
            <label for="time_off">Time Off:</label>
            <input type="text" id="time_off" name="time_off" value="{{ $configLamp->time_off }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
