<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSensorRequest;
use App\Http\Resources\SensorResource;
use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorsController extends Controller
{
    public function store(StoreSensorRequest $request, $id = 0)
    {
        return Sensor::updateOrCreate([
            'id' => $id,
        ], [
            'mac_device' => $request->get('mac_device') ?? null,
            'name' => $request->get('name'),
            'datetime' => $request->get('datetime') ?? null,
            'peakmode' => $request->get('peakmode') ?? null,
            'powoffmin' => $request->get('powoffmin') ?? null,
        ]);
    }

    public function gets($id = 0)
    {
        if ($id) {
            $sensors = Sensor::where('id', $id)->orderBy('id', 'desc')->get();
        } else {
            $sensors = Sensor::orderBy('id', 'desc')->get();
        }

        return SensorResource::collection($sensors);
    }
}
