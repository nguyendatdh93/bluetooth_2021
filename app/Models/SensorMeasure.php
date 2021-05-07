<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SensorMeasure extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function measureMeasba()
    {
        return $this->hasOne(MeasureMeasba::class);
    }

    public function measureMeasdet()
    {
        return $this->hasMany(MeasureMeasdet::class);
    }

    public function measureMeaspara()
    {
        return $this->hasOne(MeasureMeaspara::class);
    }

    public function measureMeasres()
    {
        return $this->hasMany(MeasureMeasres::class);
    }
}
