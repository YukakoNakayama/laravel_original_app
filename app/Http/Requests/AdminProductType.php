<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductType extends FormRequest
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
        if($this->type_change){
            return [
                'change_typename' => 'required',
            ];
        }else if($this->type_new){
            return [
                'newtype' => 'required',
            ];
        }
        return[];
    }

    public function attributes()
    {
        return [
            'change_typename' => '商品種類名',
            'newtype' => '商品種類名',
        ];
    }
}
