<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSales extends FormRequest
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
        if($this->change_sales){
            return [
                'prev_change_date' => 'required',
                'prev_remark' => 'required',
            ];
        }
        return [];
    }

    public function attributes()
    {
        return [
            'prev_change_date' => '販売日時',
            'prev_remark' => '備考欄',
        ];
    }
}
