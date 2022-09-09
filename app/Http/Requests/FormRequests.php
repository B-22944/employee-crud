<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequests extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|regex:/^[\pL\s\-]+$/u|min:5',
            'age' => 'required|numeric|min:15|max:45',
            'designation' => 'required|min:11',
            'image' => 'required',
            'gender' => 'required',
            'cgpa' => 'required',
            'city' => 'required',
            'address' => 'required',
            'email' => 'required',
            'password' => 'required|min:8|max:16',
        ];
    }
}
