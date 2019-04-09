<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'arrival_station'=>'required|different:departure_station',
            'departure_station'=>'required|different:arrival_station',
            'number'=>
            [
              'required',
            ],

            'start_date' => 'required|date|after_or_equal:today|before_or_equal:end_date',
            'end_date' => "required|date|after_or_equal:start_date|before_or_equal:{$this->start_date} + 1 month",
        ];
    }
}
