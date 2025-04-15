<?php

namespace App\Http\Controllers;

use App\Models\ConfigLamp;
use Illuminate\Http\Request;

class ConfigLampController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function edit(ConfigLamp $configLamp)
    {
        return view('config_lamp.edit', compact('configLamp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ConfigLamp $configLamp)
    {
        $request->validate([
            'status' => 'required|boolean',
            'time_on' => 'required|string',
            'time_off' => 'required|string',
        ]);

        $configLamp->update($request->all());

        return redirect()->route('config_lamp.edit', $configLamp->id)->with('success', 'ConfigLamp updated successfully.');
    }
}