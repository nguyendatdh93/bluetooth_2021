<?php

namespace App\Http\Requests;

use App\Rules\CheckSensorSettingRelationRule;
use App\Rules\CheckSettingRelationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSensorMeasureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'datetime' => 'required',
            'measure_id' => 'required|numeric',
        ];

        if (empty($this->route('id'))) {
            $rules['sensor_id'] = ['required', 'numeric', 'min:1', new CheckSettingRelationRule($this->get('sensor_id') ?? 0, $this->get('sensor_setting_id') ?? 0)];
            $rules['sensor_setting_id'] = ['required', 'numeric', 'min:1'];
        }

        return $rules;
    }
}
