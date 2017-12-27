<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSales extends FormRequest
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

    public function data()
    {
        $data = [
            'heading' => $this->get('heading'),
            'site_id' => $this->get('site'),
            'total_payable' => $this->get('total_payable'),
            'tds_percent' =>$this->get('tds_percent'),
            'mobilization' => $this->get('mobilization'),
            'slug' => str_slug($this->get('heading'))

        ];

        return $data;
    }
}
