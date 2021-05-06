<?php

namespace App\Http\Requests;

use App\Rules\CheckSettingRelationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class StoreSensorSettingRequest extends FormRequest
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
        return [
            'setname' => 'required|string|max:8',
            'bacs' => 'required|numeric|min:1|max:5',
            'crng' => 'required|numeric|min:0|max:2',
            'eqp1' => 'required|numeric|min:-2000|max:2000',
            'eqt1' => 'required|numeric|min:0|max:60000',
            'eqp2' => 'required|numeric|min:-2000|max:2000',
            'eqt2' => 'required|numeric|min:0|max:60000',
            'eqp3' => 'required|numeric|min:-2000|max:2000',
            'eqt3' => 'required|numeric|min:0|max:60000',
            'eqp4' => 'required|numeric|min:-2000|max:2000',
            'eqt4' => 'required|numeric|min:0|max:60000',
            'eqp5' => 'required|numeric|min:-2000|max:2000',
            'eqt5' => 'required|numeric|min:0|max:60000',
            'stp' => 'required|numeric|min:-2000|max:2000',
            'enp' => 'required|numeric|min:0|max:60000',
            'pp' => 'required|numeric|min:1|max:2000',
            'dlte' => 'required|numeric|min:1|max:2000',
            'pwd' => 'required|numeric|min:10|max:10000',
            'ptm' => 'required|numeric|min:10|max:10000',
            'ibst' => 'required|numeric|min:0|max:10000',
            'iben' => 'required|numeric|min:1|max:10000',
            'ifst' => 'required|numeric|min:1|max:10000',
            'ifen' => 'required|numeric|min:1|max:10000',
            'bac.*.bacname' => 'required|string|max:5',
            'bac.*.e1' => 'required|numeric|min:-2000|max:2000',
            'bac.*.e2' => 'required|numeric|min:-2000|max:2000',
            'bac.*.e3' => 'required|numeric|min:-2000|max:2000',
            'bac.*.e4' => 'required|numeric|min:-2000|max:2000',
            'bac.*.pkp' => 'required|numeric|min:0|max:1',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
//    public function attributes()
//    {
//        return [
//            'setname' => '設定名',
//            'bacs' => '微生物測定数',
//            'crng' => 'CRNG',
//            'eqp1' => '平衡電位 1',
//            'eqt1' => '平衡時間 1',
//            'eqp2' => '平衡電位 2',
//            'eqt2' => '平衡時間 2',
//            'eqp3' => '平衡電位 3',
//            'eqt3' => '平衡時間 3',
//            'eqp4' => '平衡電位 4',
//            'eqt4' => '平衡時間 4',
//            'eqp5' => '平衡電位 5',
//            'eqt5' => '平衡時間 5',
//            'stp' => '開始電位',
//            'enp' => '終了電位',
//            'pp' => 'パルス振幅',
//            'dlte' => 'ΔE',
//            'pwd' => 'パルス幅',
//            'ptm' => 'パルス期間',
//            'ibst' => 'ベース電流(Ib)サンプル時間下限',
//            'iben' => 'ベース電流(Ib)サンプル時間上限',
//            'ifst' => 'ファラデー(If)電流サンプル時間下限',
//            'ifen' => 'ファラデー(If)電流サンプル時間上限',
//            'bac.*.bacname' => '測定対象物名',
//            'bac.*.e1' => 'E1 ベースライン検索開始電位',
//            'bac.*.e2' => 'E2 ベースライン検索開始電位',
//            'bac.*.e3' => 'E3 ベースライン検索終了電位',
//            'bac.*.e4' => 'E4 ベースライン検索終了電位',
//            'bac.*.pkp' => 'ピーク位置',
//        ];
//    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new Response(['errors' => $validator->errors()], 422);
        throw new ValidationException($validator, $response);
    }
}
