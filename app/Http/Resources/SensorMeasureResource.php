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
        $data = [
            'id' => $this->id,
            'sensor_id' => $this->sensor_id,
            'datetime' => $this->datetime,
            'no' => $this->no,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];

        if ($this->whenLoaded('measpara')) {
            $data['measpara'] = new MeasparaResource($this->measpara);
        }

        if ($this->whenLoaded('measdet')) {
            $data['measdet'] = MeasdetResource::collection($this->measdet);
        }

        if ($this->whenLoaded('measres')) {
            $data['measres'] = MeasresResource::collection($this->measres);
        }

        if ($this->whenLoaded('measba')) {
            $data['measba'] = new MeasparaResource($this->measba);
        }

        return $data;
    }
}
