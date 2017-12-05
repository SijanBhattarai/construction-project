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
            'accounthead' => $this->get('accounthead'),
            'amount' => $this->get(('amount')),
            'site' => $this->get('site'),
            'slug' => str_slug($this->get('name'))
        ];

        return $inputs;
    }

//    public function menuFillData()
//    {
//        if ($this->get('accounthead')) {
//            $accounthead = Page::find($this->get('accounthead'));
//            $route = route('page.show', $accounthead->slug);
//        } elseif (!empty($this->custom_url)) {
//            $route = $this->custom_url;
//        } else {
//            $title = "Title Page";
//            $route = "javascript:void(0);";
//        }
//
//        $inputs = [
//            'name' => $this->get('name'),
//            'accounthead' => $this->get('accounthead'),
//            'amount' => $this->get(('amount')),
//            'site' => $this->get('site'),
//            'slug' => str_slug($this->get('name'))
//        ];
//
//        return $inputs;
//    }
}
