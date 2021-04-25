<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BacSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'sensor_setting_id', 'bacname', 'e1', 'e2', 'e3', 'e4', 'pkp'
    ];
}
