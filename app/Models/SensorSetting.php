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
        'stp', 'enp', 'pp', 'dlte', 'pwd', 'ptm', 'ibst', 'iben', 'ifst',
        'ifen', 'bacname1', 'e1_1', 'e2_1', 'e3_1', 'e4_1', 'pkp1',
        'bacname2', 'e1_2', 'e2_2', 'e3_2', 'e4_2', 'pkp2',
        'bacname3', 'e1_3', 'e2_3', 'e3_3', 'e4_3', 'pkp3',
        'bacname4', 'e1_4', 'e2_4', 'e3_4', 'e4_4', 'pkp4',
        'bacname5', 'e1_5', 'e2_5', 'e3_5', 'e4_5', 'pkp5',
    ];
}
