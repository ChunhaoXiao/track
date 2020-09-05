<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class SecurityCodeRequest extends FormRequest
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
            'code' => ['required', Rule::unique('security_codes')->where(function($query){
                return $query->where([['batch_id', $this->batch_id],['company_id', $this->company_id]]);
            })],
            'batch_id' => 'required|exists:batches,id',
            'product_id' => 'required|exists:products,id',
            'company_id' => 'required|exists:companies,id',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => '防伪码不能为空',
            'code.unique' => '防伪码已存在',
            'batch_id.required' => '请选择批次',
            'batch_id.exists' => '批次不存在',
            'product_id.required' => '请选择产品',
            'product_id.exists' => '产品不存在',
            'company_id.required' => '请选择公司',
            'company_id.exists' => '公司不存在',
        ];
    }
}
