<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequisition extends FormRequest
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

        ];
    }

    public function Data()
    {
        $inputs = [
            'site_id' => $this->get('site'),
            'issued_to' => $this->get('issued_to'),
            'particulars' => $this->get('particulars'),
            'quantity' =>$this->get('quantity'),
            'unit' => $this->get('unit'),
            'remarks' => $this->get('remarks')
        ];

        return $inputs;
    }
}
