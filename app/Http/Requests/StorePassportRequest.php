<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePassportRequest extends FormRequest
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
          'issuedby' => [
            'max:1000',
            'min:1',
            'regex:/^[а-я ё.-]+$/iu',
            'required',
          ],

          'unitcode' => [
            'max:1000',
            'min:1',
            'regex:/^[а-я -ё]+$/iu',
            'required',
          ],

          'passser' => [
            'max:4',
            'min:4',
            'required',
          ],

          'passnumber' => [
            'max:6',
            'min:6',
            'required',
          ],

          'city' => [
            'max:1000',
            'min:1',
            'regex:/^[а-я ё-]+$/iu',
            'required',
          ],

          'datebirth' => 'required|date|before:issuedate',
          'issuedate' => 'required|date',
          'agree' => 'required'
        ];
    }
}
