<?php

namespace App\Http\Controllers;

use App\Models\DataSensor;
use App\Models\ConfigHeater;
use App\Models\ConfigLamp;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display dashboard with latest sensor data, device statuses, and activity logs.
     */
    public function index()
    {
        // Get latest sensor data
        $latestData = DataSensor::orderBy('updated_at', 'DESC')->first();
        $configHeater = ConfigHeater::orderBy('updated_at', 'DESC')->first();
        $configLamp = ConfigLamp::orderBy('updated_at', 'DESC')->first();
        
        $userId = Auth::id();
        $devices = Device::where('user_id', $userId)->get();
        
        // Check if lamp should be turned on based on time
        $currentTime = now()->format('H:i');
        $isTimeOn = $configLamp && $currentTime >= $configLamp->time_on && $currentTime < $configLamp->time_off;
    
        // Check if heater should be turned on based on temperature
        $isAboveMaxTemp = $latestData && $latestData->temperature > $configHeater->max_temp;
        
        // Fetch the latest activity logs
        $activityLogs = ActivityLog::orderBy('created_at', 'DESC')->take(10)->get();
    
        return view('dashboard', [
            'latestData' => $latestData,
            'configHeater' => $configHeater,
            'configLamp' => $configLamp,
            'isTimeOn' => $isTimeOn,
            'isAboveMaxTemp' => $isAboveMaxTemp,
            'devices' => $devices,
            'activityLogs' => $activityLogs,  // Pass the activity logs to the view
        ]);
    }
}