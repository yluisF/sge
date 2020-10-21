<?php

namespace App\Http\Controllers;

use App\Models\Afiliado;
use App\Models\Jerarquia;
use App\Models\Persona;
use App\Models\Secciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegitrosController extends Controller
{
    public function index()
    {
        return view('registros', [
            'jerarquia' => Jerarquia::get(),
            'seccion' => Secciones::get(),
            'persona' =>  Persona::whereRaw('id_persona = (select max(`id_persona`) from personas)')->get(),
        ]);
    }

    public function store()
    {
       $campos = request()->validate([
            'fol_afil' => 'required|unique:afiliados',
            'clv_elector' => 'required|min:18|unique:afiliados',
            'folio_ine' => 'required|unique:afiliados',
            'fecha_afi' => 'required|date',
            'distro_fed' =>'required',
            'seccion_id' =>'integer|required|not_in:0',
            'persona_id' =>'integer|required|not_in:0',
            'jerarquia_id' =>'integer|required|not_in:0',
        ],
        [
            'fol_afil.required' => 'Introduce tu folio de afiliado, que te proporciona la organización',
            'clv_elector.required' => 'Introduce tu clave Elector, se encuentra en tu INE',
            'folio_ine.required' => 'Introduce tu Folio de INE',
            'fecha_afi.required' => 'Introduce la fecha que inciaste como afiliado',
            'distro_fed.required' => 'Introduce el Distristo Federal',
            'jerarquia_id.required' => 'Se perdieron tus datos vuelve a Registro anterior',
            'persona_id.required' => 'NO se encotnro ningun Cargo Intentalo de Nuevo',
            'seccion_id.required' => 'NO se encontraron secciones'

        ]);

        Afiliado::create($campos);
            return redirect('/inicio');
    }
}
