<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DataSensor;
use App\Models\ConfigHeater;
use App\Models\ConfigLamp;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $devices = Device::where('user_id', $userId)->get();
        return view('devices.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $device = Device::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
        ]);

        // Log the activity
        $this->logActivity('Device Created', $device);

        return redirect()->route('devices.index')->with('success', 'Device created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        return view('devices.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Device $device)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $device->update([
            'name' => $request->name,
        ]);

        // Log the activity
        $this->logActivity('Device Updated', $device);
    
        return redirect()->route('devices.index')->with('success', 'Device updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        $device->delete();

        // Log the activity
        $this->logActivity('Device Deleted', $device);

        return redirect()->route('devices.index')->with('success', 'Device deleted successfully.');
    }

    /**
     * Add a DataSensor to the specified device.
     */
    public function addDataSensor(Request $request, $deviceId)
    {
        $request->validate([
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'light_intensity' => 'required|numeric',
        ]);

        $device = Device::findOrFail($deviceId);
        $dataSensor = new DataSensor($request->all());
        $device->dataSensors()->save($dataSensor);

        // Log the activity
        $this->logActivity('DataSensor Added', $dataSensor);

        return redirect()->route('devices.show', $deviceId)->with('success', 'DataSensor added successfully.');
    }

    /**
     * Add a ConfigHeater to the specified device.
     */
    public function addConfigHeater(Request $request, $deviceId)
    {
        $request->validate([
            'mode' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'max_temp' => 'required|numeric',
            'min_temp' => 'required|numeric',
        ]);

        $device = Device::findOrFail($deviceId);
        $configHeater = new ConfigHeater($request->all());
        $device->configHeater()->save($configHeater);

        // Log the activity
        $this->logActivity('ConfigHeater Added', $configHeater);

        return redirect()->route('devices.show', $deviceId)->with('success', 'ConfigHeater added successfully.');
    }

    /**
     * Add a ConfigLamp to the specified device.
     */
    public function addConfigLamp(Request $request, $deviceId)
    {
        $request->validate([
            'status' => 'required|string|max:255',
            'time_on' => 'required|date_format:H:i',
            'time_off' => 'required|date_format:H:i',
        ]);

        $device = Device::findOrFail($deviceId);
        $configLamp = new ConfigLamp($request->all());
        $device->configLamp()->save($configLamp);

        // Log the activity
        $this->logActivity('ConfigLamp Added', $configLamp);

        return redirect()->route('devices.show', $deviceId)->with('success', 'ConfigLamp added successfully.');
    }

    /**
     * Log an activity.
     */
    protected function logActivity($logName, $model)
    {
        ActivityLog::create([
            'log_name' => $logName,
            'subject_id' => $model->id,
            'subject_type' => get_class($model),
            'causer_id' => Auth::id(),
            'causer_type' => 'User',
            'properties' => json_encode($model->toArray()),
        ]);
    }
}