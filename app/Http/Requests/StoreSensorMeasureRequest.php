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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if (!empty($this->get('measdet')) && is_string($this->get('measdet'))) {
            $this->merge([
                'measdet' => json_decode($this->get('measdet'), JSON_NUMERIC_CHECK),
            ]);
        }
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
            'no' => 'required|string',
        ];

        if (empty($this->route('id'))) {
            $rules['sensor_id'] = ['required', 'numeric', 'min:1', new CheckSettingRelationRule($this->get('sensor_id') ?? 0, $this->get('sensor_setting_id') ?? 0)];
        }

        if (!empty($this->get('measba')) && is_array($this->get('measba'))) {
            $rules['measba.datetime'] = 'required';
            $rules['measba.num'] = 'required|numeric';
            $rules['measba.pstaterr'] = 'required|numeric';
        }

        if (!empty($this->get('measpara'))) {
            $rules['measpara'] = 'required|array';
        }

        if (!empty($this->get('measdet')) && is_array($this->get('measdet'))) {
            $rules['measdet.*.no'] = 'required|string';
            $rules['measdet.*.deltae'] = 'required|numeric';
            $rules['measdet.*.deltai'] = 'required|numeric';
            $rules['measdet.*.eb'] = 'required|numeric';
            $rules['measdet.*.ib'] = 'required|numeric';
            $rules['measdet.*.ef'] = 'required|numeric';
            $rules['measdet.*.if'] = 'required|numeric';
        }

        if (!empty($this->get('measres'))) {
            $rules['measres.*.name'] = 'required|string|max:50';
            $rules['measres.*.pkpot'] = 'required|string';
            $rules['measres.*.dltc'] = 'required|string';
            $rules['measres.*.bgc'] = 'required|string';
            $rules['measres.*.err'] = 'required|string';
            $rules['measres.*.blpsx'] = 'required|string|max:10';
            $rules['measres.*.blpsy'] = 'required|string|max:10';
            $rules['measres.*.blpex'] = 'required|string|max:10';
            $rules['measres.*.blpey'] = 'required|string|max:10';
        }

        return $rules;
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new Response(['errors' => $validator->errors()], 422);
        throw new ValidationException($validator, $response);
    }
}
