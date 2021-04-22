<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSensorRequest;
use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorsController extends Controller
{
    public function store(StoreSensorRequest $request)
    {
        Sensor::updateOrCreate([
           
        ], [

        ]);
    }
}
