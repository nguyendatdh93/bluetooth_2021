<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensorSettingsController extends Controller
{
    public function gets(Request $request)
    {
        $request->validate([
            'sensor_id' => 'required|numeric',
        ]);
    }
}
