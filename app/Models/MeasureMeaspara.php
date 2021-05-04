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
        'settings' => 'array',
    ];

    protected $appends = ['casted_settings'];

    public function getCastedSettingsAttribute()
    {
        return json_decode($this->settings);
    }
}
