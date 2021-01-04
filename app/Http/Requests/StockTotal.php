<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockTotal extends FormRequest
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
        if($this->change_stock){
            return[
                'stocktotal_change' => ['required','integer'],
            ];
        }
        return [];
    }

    public function attributes()
    {
        return [
            'stocktotal_change' => '総数',
        ];
    }

    public function messages()
    {
        return [
            ':attribute を半角数字で入力してください',
        ];
    }
}
