<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use function PHPUnit\Framework\isJson;

class MeasparaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $data = json_decode($this->settings);
        if (is_string($data->bac) && $this->isJsonString($data->bac)) {
            $data->bac = json_decode($data->bac);
        }

        return $data;
    }

    private function isJsonString($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
