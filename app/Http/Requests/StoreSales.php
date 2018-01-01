<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSales extends FormRequest
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
            'site_id' => $this->get('site'),
            'customer_id' => $this->get('customer'),
            'taxable_sales' => $this->get('taxable_sales'),
            'tds_percent' =>$this->get('tds_percent'),
            'retention' => $this->get('retention'),
            'mobilization' => $this->get('mobilization'),
            'bnk' => $this->get('bnk'),
            'vat' => $this->get('vat'),
        ];

        return $inputs;
    }
}
