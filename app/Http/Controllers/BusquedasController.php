<?php

namespace App\Http\Controllers;

use App\Models\Afiliado;
use App\Models\Colonia;
use App\Models\Direcciones;
use App\Models\Jerarquia;
use App\Models\Municipio;
use App\Models\Persona;
use App\Models\Secciones;
use Illuminate\Http\Request;

class BusquedasController extends Controller
{
        public function seccion()
    {
        return view('inicio.seccion', [
            'llamausers' => Persona::latest()->paginate(5),
            'seccion' => Secciones::get(),
        ]);
    }

    public function muestra(Request $request)
    {
        $valor = $request->validate([
        'seccion'=>'required|numeric',
    ]);
        return  view('inicio.resulseccion',[
            'resultado' => Afiliado::join('personas', 'personas.id_persona', '=', 'afiliados.persona_id')->where('seccion_id', $valor)->paginate(5),
            'seccion' => Secciones::get(),
            'see' => Secciones::where('id_seccion', $valor)->first(),

        ]);
    }

    public function cargo()
    {
        return view('inicio.cargo', [
            'llamausers' => Persona::latest()->paginate(5),
            'jerarquia' => Jerarquia::get(),
        ]);
    }

    public function muestrajerarquia(Request $request)
    {
        $valor = $request->validate([
        'jerarquia'=>'required|numeric',
    ]);
        return  view('inicio.resuljerarquia',[
            'resultado' => Afiliado::join('personas', 'personas.id_persona', '=', 'afiliados.persona_id')->where('jerarquia_id', $valor)->paginate(5),
            'jerarquia' => Jerarquia::get(),
            'jer' => Jerarquia::where('id_jerarquia', $valor)->first(),

        ]);
    }

    public function municipio()
    {
        return view('inicio.municipio', [
            'llamausers' => Persona::latest()->paginate(5),
            'municipio' => Municipio::get(),
        ]);
    }


    public function muestramunicipio(Request $request)
    {
        $valor = $request->validate([
        'municipio'=>'required|Integer',
    ]);
        return  view('inicio.resulmunicipio',[
            'resultado' => Persona::join('direcciones', 'direcciones.persona_id', '=', 'personas.id_persona')->where('direcciones.municipio_id', $valor)->paginate(5),
            'mun' => Municipio::where('id_municipio', $valor)->first(),
        ]);
    }

    public function colonia()
    {
        return view('inicio.colonia', [
            'llamausers' => Persona::latest()->paginate(5),
            'colonia' => Colonia::get(),
        ]);
    }

    public function muestracolonia(Request $request)
    {
        $valor = $request->validate([
        'colonia'=>'required|numeric',
    ]);
        return  view('inicio.resulcolonia',[
            'resultado' => Persona::join('direcciones', 'direcciones.persona_id', '=', 'personas.id_persona')->where('direcciones.colonia_id', $valor)->paginate(5),
            'col' => Colonia::where('id_colonia', $valor)->first(),
        ]);
    }
}
