<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'age' => 'required',
            'profession' => 'required',
            'courses' => 'required|array|min:1'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'age' => 'idade',
            'profession' => 'profissão',
            'courses' => 'cursos'
        ];
    }
}
