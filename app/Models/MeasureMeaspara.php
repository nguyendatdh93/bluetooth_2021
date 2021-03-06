<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class MeasureMeaspara extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'settings' => 'object',
    ];
}
