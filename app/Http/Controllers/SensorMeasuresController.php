<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSensorMeasureRequest;
use App\Http\Resources\SensorMeasureResource;
use App\Models\SensorMeasure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SensorMeasuresController extends Controller
{
    public function store(StoreSensorMeasureRequest $request, $id = 0)
    {
        try {
            DB::beginTransaction();
            $sensorMeasure = $this->storeSensorMeasure($request, $id);
            $this->storeMeasba($request, $sensorMeasure);
            $this->storeMeaspara($request, $sensorMeasure);
            $this->storeMeasdet($request, $sensorMeasure);
            $this->storeMeasres($request, $sensorMeasure);
            DB::commit();
            $sensorMeasure = SensorMeasure::with(['measureMeasba', 'measureMeasdet', 'measureMeaspara', 'measureMeasres'])
                ->where('id', $sensorMeasure->id)
                ->first();
            return new SensorMeasureResource($sensorMeasure);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

    public function paginate($sensorId)
    {
        $sensorMeasures = SensorMeasure::with(['measureMeasba', 'measureMeasdet', 'measureMeaspara', 'measureMeasres'])
            ->where('sensor_id', $sensorId)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return SensorMeasureResource::collection($sensorMeasures);
    }

    private function storeMeasres($request, $sensorMeasure)
    {
        if ($measres = $request->get('measres')) {
            $sensorMeasure->measureMeasres()->delete();
            $sensorMeasure->measureMeasres()->create([
                'name' => $measres['name'],
                'pkpot' => $measres['pkpot'],
                'dltc' => $measres['dltc'],
                'bgc' => $measres['bgc'],
                'err' => $measres['err'],
            ]);
        }
    }

    private function storeMeasdet($request, $sensorMeasure)
    {
        if ($measdet = $request->get('measdet')) {
            $sensorMeasure->measureMeasdet()->delete();
            $sensorMeasure->measureMeasdet()->create([
                'rawdmp' => json_encode($measdet['rawdmp']),
            ]);
        }
    }

    private function storeMeaspara($request, $sensorMeasure)
    {
        if ($measpara = $request->get('measpara')) {
            $sensorMeasure->measureMeaspara()->delete();
            $sensorMeasure->measureMeaspara()->create([
                'setname' => $measpara['setname'],
                'bacs' => $measpara['bacs'],
                'crng' => $measpara['crng'],
                'eqp1' => $measpara['eqp1'],
            ]);
        }
    }

    private function storeMeasba($request, $sensorMeasure)
    {
        if ($measba = $request->get('measba')) {
            $sensorMeasure->measureMeasba()->delete();
            $sensorMeasure->measureMeasba()->create([
                'datetime' => $measba['datetime'],
                'pastaerr' => $measba['pastaerr'],
            ]);
        }
    }

    private function storeSensorMeasure($request, $id)
    {
        $sensorMeasureData = [
            'datetime' => $request->get('datetime'),
            'measure_id' => $request->get('measure_id'),
        ];
        if ($request->get('sensor_id') && $request->get('sensor_setting_id')) {
            $sensorMeasureData['sensor_id'] = $request->get('sensor_id');
            $sensorMeasureData['sensor_setting_id'] = $request->get('sensor_setting_id');
        }

        return SensorMeasure::updateOrCreate([
            'id' => $id,
        ], $sensorMeasureData);
    }
}
