<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassRequest extends FormRequest
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
            'password' => ['required','same:password_confirmation','min:6','max:10','regex:/^[\da-z-!"№;%:?*().,+=_]+$/iu',],
            'password_confirmation' => ['required','same:password','min:6','max:10','regex:/^[\da-z-!"№;%:?*().,+=_]+$/iu',]
        ];
    }
}
