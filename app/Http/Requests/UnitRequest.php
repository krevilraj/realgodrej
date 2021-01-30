<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this Request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the Request.
     *
     * @return array
     */
    public function rules()
    {
        return [
	        'title' => 'required',
	        'description' => 'required',
        ];
    }
}
