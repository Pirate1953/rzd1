<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RaspRequest extends FormRequest
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
            'date' => 'required|date|after_or_equal:today',
            'arrival_station'=>'required|different:departure_station',
            'departure_station'=>'required|different:arrival_station',
        ];
    }
}
