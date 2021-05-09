<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class SensorMeasure extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function measba()
    {
        return $this->hasOne(MeasureMeasba::class);
    }

    public function measdet()
    {
        return $this->hasMany(MeasureMeasdet::class);
    }

    public function measpara()
    {
        return $this->hasOne(MeasureMeaspara::class);
    }

    public function measres()
    {
        return $this->hasMany(MeasureMeasres::class);
    }
}
