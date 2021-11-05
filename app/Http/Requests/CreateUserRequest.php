<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required', 'min:6'],
            'job_title'  => 'required',
            'website'  => 'required',
            'bio' => 'required',
            'twitter' => 'url',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El email es requerido',
            'email.unique' => 'El email de ser unico',
            'password.required' => 'El password es requerido',
            'password.min' => 'El password debe tener mas de 6 caracteres',
            'job_title' => 'El campo es requerido',
            'website' => 'El campo es requerido',
            'bio.required' => 'El campo es requerido',
            'twitter.url' => 'No es una direccion URL valida',
        ];
    }


    // Funcion estatica que obtiene los datos de los modelos y los pasa al controlador
    // Funcion con metod validate que obtiene un array con lo obtenido de la relacion
    public function createUser()
    {
        DB::transaction(function() {

            $data = $this->validated();

             // Crea una variable para ser relacionada con los demas objetos a traves del ID
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

            // Llama a la funcion del modelo para que Eloquent obtenga la coleccion de la relacion
            $user->profile()->create([
                'job_title'  => $data['job_title'],
                'website'  => $data['website'],
                'bio' => $data['bio'],
                'twitter' => $data['twitter'],
            ]);
        });
    }
}
