<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensorsController extends Controller
{
    public function getSettings(Request $request)
    {
        $request->validate([
            'sensor_id' => 'required|numeric',
        ]);
    }
}
