<?php

namespace App\Http\Controllers;

use App\Models\ConfigHeater;
use Illuminate\Http\Request;

class ConfigHeaterController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function edit(ConfigHeater $configHeater)
    {
        return view('config_heater.edit', compact('configHeater'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ConfigHeater $configHeater)
    {
        $request->validate([
            'mode' => 'required|string',
            'status' => 'required|boolean',
            'max_temp' => 'required|numeric',
            'min_temp' => 'required|numeric',
        ]);

        $configHeater->update($request->all());

        return redirect()->route('config_heater.edit', $configHeater->id)->with('success', 'ConfigHeater updated successfully.');
    }
}