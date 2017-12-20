<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransaction extends FormRequest
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
            //
        ];
    }

    public function Data()
    {
        $inputs = [
            'name' => $this->get('name'),
            'accounthead_id' => $this->get('accounthead'),
            'site_id' => $this->get('site'),
            'amount' => $this->get('amount'),
            'cheque_no' =>$this->get('cheque_no'),
            'cheque_date' => $this->get('cheque_date'),
            'of_no' => $this->get('of_no'),
            'slug' => str_slug($this->get('name'))
        ];

        return $inputs;
    }

}
