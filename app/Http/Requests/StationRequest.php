<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StationRequest extends FormRequest
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
            'min:1',
            'max:100',
            'numeric',
            'required',
        ],

        'zone_id' => [
            'numeric',
            'required',
      ],

          'name' => [
            'max:255',
            'min:1',
            'required',
            'regex:/^[а-я ё.-]+$/iu',
          ],

          'description' => [
              'required',
            ]
        ];
    }
}
