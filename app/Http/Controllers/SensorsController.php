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
            'mac_device' => $request->get('mac_device'),
            'name' => $request->get('name'),
            'datetime' => $request->get('datetime'),
        ]);
    }

    public function gets($id = 0)
    {
        if ($id) {
            $sensors = Sensor::where('id', $id)->get();
        } else {
            $sensors = Sensor::all();
        }

        return SensorResource::collection($sensors);
    }
}
