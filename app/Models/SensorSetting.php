<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'sensor_id', 'setname', 'bacs', 'crng', 'eqp1', 'eqt1', 'eqp1', 'eqt1',
        'eqp2', 'eqt2', 'eqp3', 'eqt3', 'eqp4', 'eqt4', 'eqp5', 'eqt5',
        'stp', 'enp', 'pp', 'dlte', 'pwd', 'ptm', 'ibst', 'iben', 'ifst', 'ifen'
    ];

    public function bacSettings()
    {
        return $this->hasMany(BacSetting::class);
    }
}
