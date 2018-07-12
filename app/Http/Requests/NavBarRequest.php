<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NavBarRequest extends FormRequest
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
        'name'      => 'required',
        'link'      => 'required',
        'parent_id' => 'required|numeric',
        'page'      => 'required'
      ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'The name field is required.',
            'link.required'      => 'The link field is required',
            'parent_id.required' => 'The parent_id field is required',
            'parent_id.numeric'  => 'The parent_id field must be a numeric',
            'page.required'      => 'The page field is required'
        ];
    }
}
