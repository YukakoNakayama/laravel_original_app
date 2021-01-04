<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSales extends FormRequest
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
            'sales_date' => 'required',
            'remark' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'sales_date' => '販売日時',
            'remark' => '備考欄'
        ];
    }
}
