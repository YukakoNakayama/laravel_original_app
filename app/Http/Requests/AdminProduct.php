<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProduct extends FormRequest
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
        if($this->product_change){
            return [
                'change_productname' => 'required',
            ];
        }else if($this->product_new){
            return [
                'newproduct' => 'required',
            ];
        }
        return[];
    }

    public function attributes()
    {
        return [
            'change_productname' => '商品名',
            'newproduct' => '商品名',
        ];
    }
}
