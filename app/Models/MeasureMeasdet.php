<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class MeasureMeasdet extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'rawdmp' => 'array',
    ];

    protected $appends = ['casted_rawdmp'];

    public function getCastedRawdmpAttribute()
    {
        return json_decode($this->rawdmp);
    }
}
