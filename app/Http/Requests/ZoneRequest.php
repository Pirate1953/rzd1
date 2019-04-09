<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZoneRequest extends FormRequest
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
          'number' => [
              'min:0',
              'max:100',
              'numeric',
              'required',
        ],

          'name' => [
              'max:255',
              'min:1',
              'regex:/^[а-я ё-]+$/iu',
              'required',
            ],

          'price' => [
            'min:20',
            'max:100',
            'numeric',
            'required',
          ]
        ];
    }
}
