<?php

namespace App\Http\Requests;

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
            'bacname1' => 'required|string|max:5',
            'e1_1' => 'required|numeric|min:-2000|max:2000',
            'e2_1' => 'required|numeric|min:-2000|max:2000',
            'e3_1' => 'required|numeric|min:-2000|max:2000',
            'e4_1' => 'required|numeric|min:-2000|max:2000',
            'pkp1' => 'required|numeric|min:0|max:1',
            'bacname2' => 'required|string|max:5',
            'e1_2' => 'required|numeric|min:-2000|max:2000',
            'e2_2' => 'required|numeric|min:-2000|max:2000',
            'e3_2' => 'required|numeric|min:-2000|max:2000',
            'e4_2' => 'required|numeric|min:-2000|max:2000',
            'pkp2' => 'required|numeric|min:0|max:1',
            'bacname3' => 'required|string|max:5',
            'e1_3' => 'required|numeric|min:-2000|max:2000',
            'e2_3' => 'required|numeric|min:-2000|max:2000',
            'e3_3' => 'required|numeric|min:-2000|max:2000',
            'e4_3' => 'required|numeric|min:-2000|max:2000',
            'pkp3' => 'required|numeric|min:0|max:1',
            'bacname4' => 'required|string|max:5',
            'e1_4' => 'required|numeric|min:-2000|max:2000',
            'e2_4' => 'required|numeric|min:-2000|max:2000',
            'e3_4' => 'required|numeric|min:-2000|max:2000',
            'e4_4' => 'required|numeric|min:-2000|max:2000',
            'pkp4' => 'required|numeric|min:0|max:1',
            'bacname5' => 'required|string|max:5',
            'e1_5' => 'required|numeric|min:-2000|max:2000',
            'e2_5' => 'required|numeric|min:-2000|max:2000',
            'e3_5' => 'required|numeric|min:-2000|max:2000',
            'e4_5' => 'required|numeric|min:-2000|max:2000',
            'pkp5' => 'required|numeric|min:0|max:1',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'setname' => '設定名',
            'bacs' => '微生物測定数',
            'crng' => 'CRNG',
            'eqp1' => '平衡電位 1',
            'eqt1' => '平衡時間 1',
            'eqp2' => '平衡電位 2',
            'eqt2' => '平衡時間 2',
            'eqp3' => '平衡電位 3',
            'eqt3' => '平衡時間 3',
            'eqp4' => '平衡電位 4',
            'eqt4' => '平衡時間 4',
            'eqp5' => '平衡電位 5',
            'eqt5' => '平衡時間 5',
            'stp' => '開始電位',
            'enp' => '終了電位',
            'pp' => 'パルス振幅',
            'dlte' => 'ΔE',
            'pwd' => 'パルス幅',
            'ptm' => 'パルス期間',
            'ibst' => 'ベース電流(Ib)サンプル時間下限',
            'iben' => 'ベース電流(Ib)サンプル時間上限',
            'ifst' => 'ファラデー(If)電流サンプル時間下限',
            'ifen' => 'ファラデー(If)電流サンプル時間上限',
            'bacname1' => '測定対象物名',
            'e1_1' => 'E1 ベースライン検索開始電位',
            'e2_1' => 'E2 ベースライン検索開始電位',
            'e3_1' => 'E3 ベースライン検索終了電位',
            'e4_1' => 'E4 ベースライン検索終了電位',
            'pkp1' => 'ピーク位置',
            'bacname2' => '測定対象物名',
            'e1_2' => 'E1 ベースライン検索開始電位',
            'e2_2' => 'E2 ベースライン検索開始電位',
            'e3_2' => 'E3 ベースライン検索終了電位',
            'e4_2' => 'E4 ベースライン検索終了電位',
            'pkp2' => 'ピーク位置',
            'bacname3' => '測定対象物名',
            'e1_3' => 'E1 ベースライン検索開始電位',
            'e2_3' => 'E2 ベースライン検索開始電位',
            'e3_3' => 'E3 ベースライン検索終了電位',
            'e4_3' => 'E4 ベースライン検索終了電位',
            'pkp3' => 'ピーク位置',
            'bacname4' => '測定対象物名',
            'e1_4' => 'E1 ベースライン検索開始電位',
            'e2_4' => 'E2 ベースライン検索開始電位',
            'e3_4' => 'E3 ベースライン検索終了電位',
            'e4_4' => 'E4 ベースライン検索終了電位',
            'pkp4' => 'ピーク位置',
            'bacname5' => '測定対象物名',
            'e1_5' => 'E1 ベースライン検索開始電位',
            'e2_5' => 'E2 ベースライン検索開始電位',
            'e3_5' => 'E3 ベースライン検索終了電位',
            'e4_5' => 'E4 ベースライン検索終了電位',
            'pkp5' => 'ピーク位置',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new Response(['errors' => $validator->errors()], 422);
        throw new ValidationException($validator, $response);
    }
}
