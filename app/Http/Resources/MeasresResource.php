<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeasresResource extends JsonResource
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
            'name' => $this->name,
            'pkpot' => $this->pkpot,
            'dltc' => $this->dltc,
            'bgc' => $this->bgc,
            'err' => $this->err,
            'blpsx' => $this->blpsx,
            'blpsy' => $this->blpsy,
            'blpex' => $this->blpex,
            'blpey' => $this->blpey,
            'created_at' => $this->created_at->format('Y-m-d H:m:i'),
        ];
    }
}
