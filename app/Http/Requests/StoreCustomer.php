<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
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
            'name'              => $this->get('name'),
            'address'          => $this->get('address'),
            'email'       => $this->get('email'),
            'contact'       => $this->get('contact'),
            'slug'              => str_slug($this->get('name')),

        ];

        return $data;
    }
}
