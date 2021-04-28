<?php

namespace App\Http\Controllers;

use App\Http\Resources\SensorMeasureResource;
use App\Models\SensorMeasure;
use Illuminate\Http\Request;

class SensorMeasuresController extends Controller
{
    public function paginate($sensorId)
    {
        $sensorMeasures = SensorMeasure::where('sensor_id', $sensorId)->orderBy('id', 'desc')->paginate(10);
        return SensorMeasureResource::collection($sensorMeasures);
    }
}
