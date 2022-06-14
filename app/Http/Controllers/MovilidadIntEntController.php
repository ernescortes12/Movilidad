<?php

namespace App\Http\Controllers;

use App\Models\InstitucionEntidadInt;
use App\Models\MovilidadIntEnt;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class MovilidadIntEntController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $instEnt = InstitucionEntidadInt::where('estado', 1)->get();
        return view('movilidades.entrante.createint', compact('instEnt'));
    }


    public function store(Request $request, MovilidadIntEnt $mov)
    {
        $request->validate([
            'mie_adminstudoc' => 'required',
            'mie_firstname' => 'required',
            'mie_lastname' => 'required',
            'mie_instent' => 'required',
            'mie_activo' => 'required',
            'mie_fecha' => 'required',
            'mie_vigencia' => 'required',
        ]);

        $mov->tipoPersona = $request->post('mie_adminstudoc');
        $mov->firstNameSup = $request->post('mie_firstname');
        $mov->secnameSup = $request->post('mie_secondname');
        $mov->lastNameSup = $request->post('mie_lastname');
        $mov->titulosOb = $request->post('mie_titulos');
        $mov->activo = $request->post('mie_activo');
        $mov->fecha = $request->post('mie_fecha');
        $mov->vigencia = $request->post('mie_vigencia');
        $mov->sedeReg = $request->post('mie_sedereg');
        $mov->objeto = $request->post('mie_objeto');
        $mov->resultado = $request->post('mie_result');
        $mov->instEnt_id = $request->post('mie_instent');
        $mov->user_id = auth()->user()->id;


        $mov->save();

        return redirect()->route('login.activites')
            ->with('success', 'Movilidad creada correctamente!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
