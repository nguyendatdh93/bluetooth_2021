<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Sensor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function settings()
    {
        return $this->hasMany(SensorSetting::class);
    }
}