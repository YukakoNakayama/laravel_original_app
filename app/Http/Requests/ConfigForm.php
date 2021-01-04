<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigForm extends FormRequest
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
            'newperson' => ['required_without_all:change_personname,person_delete'],
            'change_personname' => ['required_without_all:newperson,person_delete'],
        ];
    }

    public function attributes()
    {
        return [
            'newperson' => '担当者名',
            'change_personname' => '担当者名',
        ];
    }

    public function messages()
    {
        return [
            '変更後の担当者名または新規担当者名のどちらかを入力してください',
        ];
    }
}
