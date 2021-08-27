<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nome' => 'required|string|min:3|max:255',
            'email' => 'required|email',
            'cpf' => 'required|numeric|min:11|max:14',
            'data_nascimento' => 'required|date_format:Y-m-d',
            'status' => 'nullable|boolean',
        ];
    }
}
