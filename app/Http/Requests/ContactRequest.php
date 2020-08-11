<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'subject' => "required",
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'Tên không được để trống',
            'email.required'  => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'subject.required' => 'Tiêu đề không được để trống',
            'content.required'    => 'Nội dung không được để trống',
        ];
    }
}
