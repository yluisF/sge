<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ActuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inicio.actuform');
    }

    public function edit(Usuario $email)
    {
        return view('inicio.formpActualiza',[
            'usuario' => $email
        ]);
    }

    public function update(Usuario $email)
    {
        $email->update([
            'celular' => request('celular'),
        ]);


        return redirect('/editar');
    }

}
