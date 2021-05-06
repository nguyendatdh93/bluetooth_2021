<?php

namespace App\Http\Requests;

use App\Rules\CheckSensorSettingRelationRule;
use App\Rules\CheckSettingRelationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

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
        }

        if (!empty($this->get('measba'))) {
            $rules['measba.datetime'] = 'required';
            $rules['measba.num'] = 'required|numeric';
            $rules['measba.pastaerr'] = 'required|numeric';
        }

        if (!empty($this->get('measpara'))) {
            $rules['measpara'] = 'required|array';
        }

        if (!empty($this->get('measdet'))) {
            $rules['measdet.no'] = 'required|string';
            $rules['measdet.deltae'] = 'required|numeric';
            $rules['measdet.deltal'] = 'required|regex:/^\d+(\.\d{1,2})?$/';
            $rules['measdet.eb'] = 'required|numeric';
            $rules['measdet.lb'] = 'required|regex:/^\d+(\.\d{1,2})?$/';
            $rules['measdet.ef'] = 'required|numeric';
            $rules['measdet.lf'] = 'required|regex:/^\d+(\.\d{1,2})?$/';

        }

        if (!empty($this->get('measres'))) {
            $rules['measres.name'] = 'required|string|max:50';
            $rules['measres.pkpot'] = 'required|numeric';
            $rules['measres.dltc'] = 'required|numeric';
            $rules['measres.bgc'] = 'required|numeric';
            $rules['measres.err'] = 'required|numeric';
        }

        return $rules;
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new Response(['errors' => $validator->errors()], 422);
        throw new ValidationException($validator, $response);
    }
}
