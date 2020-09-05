<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class BatchRequest extends FormRequest
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
            'name' => 'required',
            'batch_number' => ['required', Rule::unique('batches')->ignore($this->batch)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '批次名称不能为空',
            'batch_number.required' => '批次编号不能为空',
            'batch_number.unique' => '批次编号已存在',
        ];
    }
}
