<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDireccionRequest;
use App\Models\Colonia;
use App\Models\Direcciones;
use App\Models\Municipio;
use App\Models\Persona;
use App\Models\Vinculo;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inicio.direccion', [
            'municipio' => Municipio::get(),
            'colonia' => Colonia::get(),
            'persona' => Persona::where('email', auth()->user()->email)->first(),
            //'persona' =>  Persona::whereRaw('id_persona = (select max(`id_persona`) from personas)')->get(),
        ]);
    }

    public function store(CreateDireccionRequest $request)
    {



        $persona_id = request('persona_id');
        $direccion = request('direccion');
        $no_int = request('no_int');
        $no_ext = request('no_ext');
        $localidad = request('localidad');
        $cp = request('cp');
        $latitud = request('latitud');
        $longitud = request('longitud');
        $colonia_id = request('colonia_id');
        $municipio_id = request('municipio_id');
 //Persona::select('id_persona')->where('email', $email)->first()
        Direcciones::create([
           'persona_id' => $persona_id,
           'direccion' => $direccion,
            'no_int' => $no_int,
            'no_ext' => $no_ext,
            'localidad' => $localidad,
            'cp' => $cp,
            'latitud' => $latitud,
            'longitud' => $longitud,
            'colonia_id' => $colonia_id,
            'municipio_id' => $municipio_id,
        ]);

          return redirect('/inicio');
    }

}



