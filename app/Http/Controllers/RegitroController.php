<?php

namespace App\Http\Controllers;

use App\Models\Jerarquia;
use App\Models\Persona;
use Illuminate\Http\Request;

class RegitroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registro', [
            'jerarquia' => Jerarquia::get()
        ]);
    }


    public function store()
    {
       $campos = request()->validate([
            'email' => 'required|email',
            'nombre' => 'required|min:3',
            'app' => 'required|min:3',
            'apm' => 'required|min:3',
            'celular' =>'required|min:10|max:10',
            'birthday' =>'required',

        ],
        [
            'email.required' => 'Introduce correctamente el Correo',
            'name.required' => 'Introduce tu Nombre(s)',
            'app.required' => 'Introduce tu Apellido Paterno',
            'apm.required' => 'Introduce tu Apellido Materno',
            'telcelular.required' => 'El telefono celular debe contener 10 digitos',
            'birthday.required' => 'Introduce la fecha de Nacimiento',
            'telcelular.min' => 'El número celular es incorrecto',
            'telcelular.max' => 'El numero celular debe contener únicamente 10 dígitos',
        ]);

        Persona::create($campos);
            return redirect('/registros');

    }


}
