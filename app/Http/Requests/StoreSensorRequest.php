<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class StoreSensorRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
            'mac_device' => ['string', 'max:50'],
            'name' => 'required|string|max:20',
            'datetime' => 'required',
            'peakmode' => 'required|numeric',
            'powoffmin' => 'required|numeric|min:0|max:60',
        ];

        if (!$this->route('id')) {
            $rules['mac_device'][] = 'unique:sensors,mac_device';
        }

        return $rules;
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new Response(['errors' => $validator->errors()], 422);
        throw new ValidationException($validator, $response);
    }
}
