<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SensorMeasureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sensor_id' => $this->sensor_id,
            'datetime' => $this->datetime,
            'no' => $this->no,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'measpara' => new MeasparaResource($this->measpara),
            'measdet' => MeasdetResource::collection($this->measdet),
            'measres' => MeasresResource::collection($this->measres),
            'measba' => new MeasbaResource($this->measba),
        ];
    }
}
