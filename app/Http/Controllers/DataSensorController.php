<?php

namespace App\Http\Controllers;

use App\Models\DataSensor;
use Illuminate\Http\Request;

class DataSensorController extends Controller
{
    /**
     * Store data received from ESP.
     */
    public function store(Request $request)
    {
        $request->validate([
            'device_id' => 'required|exists:devices,id',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'light_intensity' => 'required|numeric',
        ]);

        DataSensor::create($request->all());

        return response()->json(['message' => 'Data received successfully'], 201);
    }

    /**
     * Display the specified data.
     */
    public function show(DataSensor $dataSensor)
    {
        return response()->json($dataSensor);
    }
}