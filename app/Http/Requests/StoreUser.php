<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|max:200',
            'email'    => 'required',
            'password' => 'required|confirmed',
        ];
    }

    public function data()
    {
        return $data = [
            'name'     => $this->get('name'),
            'slug' => str_slug($this->get('name')),
            'email'    => $this->get('email'),
            'password' => bcrypt($this->get('password'))
        ];
    }
}
