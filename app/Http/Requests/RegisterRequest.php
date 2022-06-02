<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'ci' => ['required', 'unique:users,ci', 'min:6'],
            'sexo' => 'required',
            'telefono' => ['required', 'unique:users,telefono', 'min:8'],
            'domicilio' => '',
            'estado' => '',
            'TipoC' => 'required',
            'TipoE' => 'required',
            'TipoA' => 'required',
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required', 'min:5'],
            'password_confirmation' => ['required', 'same:password'],
        ];
    }
}
