<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSensorRequest;
use App\Http\Resources\SensorResource;
use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorsController extends Controller
{
    public function store(StoreSensorRequest $request)
    {
        return Sensor::updateOrCreate([
            'id' => $request->get('id') ?? 0,
        ], [
            'name' => $request->get('name'),
            'datetime' => $request->get('datetime'),
        ]);
    }

    public function get($id)
    {
        return new SensorResource(Sensor::find($id));
    }
}
