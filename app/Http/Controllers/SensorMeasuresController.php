<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSensorMeasureRequest;
use App\Http\Resources\SensorMeasureResource;
use App\Http\Resources\SensorMeasureWithoutRelationsResource;
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
            $sensorMeasure = SensorMeasure::with(['measba', 'measdet', 'measpara', 'measres'])
                ->where('id', $sensorMeasure->id)
                ->first();
            return new SensorMeasureResource($sensorMeasure);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $exception->getMessage()]);
        }
    }

    public function paginate(Request $request, $sensorId)
    {
        $sensorMeasures = SensorMeasure::where('sensor_id', $sensorId)
            ->orderBy('id', 'desc');
        $sensorMeasures = $sensorMeasures->paginate(100);
        return SensorMeasureWithoutRelationsResource::collection($sensorMeasures);
    }

    public function get($sensorMeasureId)
    {
        $sensorMeasure = SensorMeasure::with(['measba', 'measdet', 'measpara', 'measres'])
            ->where('id', $sensorMeasureId)
            ->first();
        return new SensorMeasureResource($sensorMeasure);
    }

    private function storeMeasres($request, $sensorMeasure)
    {
        if ($measres = $request->get('measres')) {
            $sensorMeasure->measres()->delete();
            foreach ($measres as $item) {
                $sensorMeasure->measres()->create([
                    'name' => $item['name'],
                    'pkpot' => $item['pkpot'],
                    'dltc' => $item['dltc'],
                    'bgc' => $item['bgc'],
                    'err' => $item['err'],
                    'blpsx' => $item['blpsx'],
                    'blpsy' => $item['blpsy'],
                    'blpex' => $item['blpex'],
                    'blpey' => $item['blpey'],
                ]);
            }
        }
    }

    private function storeMeasdet($request, $sensorMeasure)
    {
        if ($measdet = $request->get('measdet')) {
            $sensorMeasure->measdet()->delete();
            foreach ($measdet as $item) {
                $sensorMeasure->measdet()->create([
                    'no' => $item['no'],
                    'deltae' => $item['deltae'],
                    'deltai' => $item['deltai'],
                    'eb' => $item['eb'],
                    'ib' => $item['ib'],
                    'ef' => $item['ef'],
                    'if' => $item['if'],
                ]);
            }
        }
    }

    private function storeMeaspara($request, $sensorMeasure)
    {
        if ($measpara = $request->get('measpara')) {
            $sensorMeasure->measpara()->delete();
            $sensorMeasure->measpara()->create([
                'settings' => json_encode($measpara, JSON_NUMERIC_CHECK),
            ]);
        }
    }

    private function storeMeasba($request, $sensorMeasure)
    {
        if ($measba = $request->get('measba')) {
            $sensorMeasure->measba()->delete();
            $sensorMeasure->measba()->create([
                'datetime' => $measba['datetime'],
                'num' => $measba['num'],
                'pstaterr' => $measba['pstaterr'],
            ]);
        }
    }

    private function storeSensorMeasure($request, $id)
    {
        $sensorMeasureData = [
            'datetime' => $request->get('datetime'),
            'no' => $request->get('no'),
        ];
        if ($request->get('sensor_id')) {
            $sensorMeasureData['sensor_id'] = $request->get('sensor_id');
        }

        return SensorMeasure::updateOrCreate([
            'id' => $id,
        ], $sensorMeasureData);
    }
}
