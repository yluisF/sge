<?php

namespace App\Http\Controllers;

use App\Models\Afiliado;
use App\Models\Colonia;
use App\Models\Direcciones;
use App\Models\Jerarquia;
use App\Models\Login;
use App\Models\Municipio;
use App\Models\Persona;
use App\Models\Secciones;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('inicio.home', [
            'llamausers' => Persona::latest()->paginate(5),
            'wow' => Jerarquia::join('afiliados','afiliados.jerarquia_id', '=', 'jerarquias.id_jerarquia')->join('personas', 'personas.id_persona', '=', 'afiliados.persona_id')->select('personas.email as email, jerarquias.cargo as cargo')->where('personas.email', auth()->user()->email)->take(1)->first(),


             //select jerarquias.cargo from jerarquias inner join afiliados on jerarquias.id_jerarquia = afiliados.jerarquia_id inner join personas on personas.id_persona = afiliados.persona_id where personas.email = "gustavo.padilla.ruiz.505@gmail.com";
        ]);
    }

    public function show($id)
    {
        return view('inicio.muestrausers', [
            'persona' => Persona::where('id_persona', $id)->take(1)->first(),
            'afiliado' => Afiliado::where('persona_id', $id)->take(1)->first(),
            'jerarquia' => Jerarquia::join('afiliados','afiliados.jerarquia_id', '=', 'jerarquias.id_jerarquia')->select('jerarquias.cargo as car')->where('persona_id', $id)->first(),
            'seccion' => Secciones::join('afiliados','afiliados.seccion_id', '=', 'secciones.id_seccion')->select('secciones.seccion as sec')->where('persona_id', $id)->first(),
        ]);
    }

    public function destroy($id)
    {

       $direccion = Direcciones::find($id);
       if($direccion == null){
       } else {
        $direccion->delete();
    }
      $afil = Afiliado::find($id);
        $afil->delete();
       $person = Persona::find($id);
        $person->delete();
         $users = Login::find($id);
        $users->delete();


        return redirect('/inicio');
    }

    public function crearseccion()
    {
        return view('inicio.creaseccion');
    }

    public function crearseccion2()
    {
        $campos = request()->validate([
            'seccion' => 'numeric|required|unique:secciones',
        ],
        [
            'seccion.required' => 'NO haz llenado el número de la sección',
        ]);

        Secciones::create($campos);
        return redirect('/inicio');
    }


    public function crearcolonia()
    {
        return view('inicio.creacolonia');
    }

    public function crearcolonia2()
    {
        $campos = request()->validate([
            'colonia' => 'min:3|required|unique:colonia',
        ],
        [
            'colonia.required' => 'Introduce nombre de la Colonia',
            'colonia.min' => 'La colonia debe contener más de 3 caracteres'
        ]);

        Colonia::create($campos);
        return redirect('/inicio');
    }

    public function crearmunicipio()
    {
        return view('inicio.creamunicipio');
    }

    public function crearmunicipio2()
    {
        $campos = request()->validate([
            'clv_municipio' => 'numeric|required|unique:municipios',
            'nombre_municipio' => 'required|min:3|unique:municipios',
        ],
        [
            'clv_municipio.required' => 'Es necesario Introducir la clave del municipio',
            'nombre_municipio.required' => 'Introduce el nombre del municipio',
            'nombre_municipio.min' => 'El municipio debe tener maás de 3 caracteres'
        ]);

        Municipio::create($campos);
        return redirect('/inicio');
    }

    public function buscador(Request $request)
    {
        return view('inicio.home', [
            'llamausers' => Persona::where('nombre','like', $request->texto."%")->latest()->paginate(5)
        ]);
    }



}
