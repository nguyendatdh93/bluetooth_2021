<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeasdetResource extends JsonResource
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
            'no' => $this->no,
            'deltae' => $this->deltae,
            'deltai' => $this->deltai,
            'eb' => $this->eb,
            'ib' => $this->ib,
            'ef' => $this->ef,
            'if' => $this->if,
            'created_at' => $this->created_at->format('Y-m-d H:m:i'),
        ];
    }
}
