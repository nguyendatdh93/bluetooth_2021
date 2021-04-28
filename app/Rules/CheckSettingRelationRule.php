<?php

namespace App\Rules;

use App\Models\SensorSetting;
use Illuminate\Contracts\Validation\Rule;

class CheckSettingRelationRule implements Rule
{
    private $sensorId;

    private $settingId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($sensorId, $settingId)
    {
        $this->sensorId = $sensorId;
        $this->settingId = $settingId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->sensorId && $this->settingId) {
            return SensorSetting::where('id', $this->settingId)->where('sensor_id', $this->sensorId)->count() > 0;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The setting does not belong to sensor';
    }
}
