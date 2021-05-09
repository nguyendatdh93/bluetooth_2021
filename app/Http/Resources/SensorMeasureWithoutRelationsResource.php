<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SensorMeasureWithoutRelationsResource extends JsonResource
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
        ];
    }
}
