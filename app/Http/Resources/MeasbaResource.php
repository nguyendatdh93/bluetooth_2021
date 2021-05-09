<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeasbaResource extends JsonResource
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
            'datetime' => $this->datetime,
            'num' => $this->num,
            'pstaterr' => $this->pstaterr,
            'created_at' => $this->created_at->format('Y-m-d H:m:i'),
        ];
    }
}
