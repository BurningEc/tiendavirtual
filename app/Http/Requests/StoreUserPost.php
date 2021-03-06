<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
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

            'name'=>'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'username'=>'required|unique:users',
            'email'=>'required|email|unique:users|max:255',
            'status'=>'required',
            'id_rol'=>'required',
            'url_image'=>'mimes:png,jpeg,jpg',
            'password'=>'required|min:8',
        ];
    }
    public function messages()
    {
        return [
            'ci.unique' => 'El usuario ya existe',
            'ci.digits' => 'El número debe contener 10 carácteres',
            'ci.required' => 'Este campo es obligatorio',
            'ci.numeric' => 'El campo solo acepta números',

            'ruc.unique' => 'El ruc ya existe',
            'ruc.digits' => 'El número debe contener 13 carácteres',
            'ruc.numeric' => 'El campo solo acepta números',

            'name.required' => 'Este campo es obligatorio.',
            'name.regex' => 'Este campo debe contener solo letras.',
            'last_name.required' => 'Este campo es obligatorio.',
            'last_name.regex' => 'Este campo debe contener solo letras.',

            'username.required' => 'Este campo es obligatorio.',
            'username.unique' => 'El usuario ya existe',

            'birth_date.date'=>'Ingrese una fecha valida',

            'gender.required'=>'Este campo es obligatorio.',

            'email.email' =>'No es un correo válido.',
            'email.unique' => 'El correo del usuario ya está en uso.',
            'email.required' => 'El correo del usuario es obligatorio.',

            'status.required'=>'Este campo es obligatorio.',
            'id_rol.required'=>'Este campo es obligatorio.',

            'url_image.mimes'=>'Este formato de la imagen no es valído.',

            'password.required' => 'Este campo es obligatorio.',

            'password.min' => 'La contraseña debe tener 8 mínimo 8 caracteres.',



        ];
    }
}
