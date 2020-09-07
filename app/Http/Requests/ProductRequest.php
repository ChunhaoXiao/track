<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:50',
            'brand' => 'required|max:30',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '产品名称不能为空',
            'name.max' => '产品名称最多50字符',
            'brand.required' => '品牌不能为空',
            'description.required' => "产品描述不能为空",
            'company_id' => 'nullable|exists:companies,id',
        ];
    }
}
