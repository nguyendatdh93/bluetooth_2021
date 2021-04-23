<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SensorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if (empty($this->id)) {
            return [];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'datetime' => $this->datetime,
        ];
    }
}
