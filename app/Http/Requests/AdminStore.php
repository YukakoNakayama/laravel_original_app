<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaNumHalf;

class AdminStore extends FormRequest
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
        if($this->store_change){
            return [
                'change_storename' => 'required',
                'change_password' => ['required', new AlphaNumHalf],
            ];
        }else if($this->store_new){
            return [
                'newstore' => 'required',
                'newstore_pass' => ['required', new AlphaNumHalf],
            ];
        }
        return [];
    }

    public function attributes()
    {
        return [
            'change_storename' => '店舗名',
            'change_password' => 'パスワード',
            'newstore' => '店舗名',
            'newstore_pass' => 'パスワード',
        ];
    }
}
