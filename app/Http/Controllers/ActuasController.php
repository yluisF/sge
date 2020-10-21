<?php

namespace App\Http\Controllers;

use App\Models\Colonia;
use App\Models\Direcciones;
use App\Models\Municipio;
use App\Models\Persona;
use Illuminate\Http\Request;

class ActuasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inicio.actusform', [
            'resul' => Persona::join('direcciones','direcciones.persona_id', '=', 'personas.id_persona')->select('direcciones.persona_id as persona_id')->where('personas.email', auth()->user()->email)->first(),
        ]);
    }

    public function edit($persona_id)
    {
        return view('inicio.formdActualiza',[
            'direccion' => Direcciones::where('persona_id', $persona_id)->take(1)->first(),

            'col' => Colonia::join('direcciones','direcciones.colonia_id', '=', 'colonia.id_colonia')->select('colonia.colonia as colo')->where('direcciones.persona_id', $persona_id)->first(),

            'mun' => Municipio::join('direcciones','direcciones.municipio_id', '=', 'municipios.id_municipio')->select('municipios.nombre_municipio as mono')->where('direcciones.persona_id', $persona_id)->first(),

             'municipio' => Municipio::get(),
             'colonia' => Colonia::get(),
        ]);
    }

    public function update(Direcciones $persona_id)
    {
        $persona_id->update([
            'direccion' => request('direccion'),
            'no_int' => request('no_int'),
            'no_ext' => request('no_ext'),
            'localidad' => request('localidad'),
            'cp' => request('cp'),
            'colonia_id' => request('colonia_id'),
            'municipio_id' => request('municipio_id'),
        ]);


        return redirect('/editas');
    }


}
