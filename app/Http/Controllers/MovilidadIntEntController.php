<?php

namespace App\Http\Controllers;

use App\Models\InstitucionEntidadInt;
use App\Models\MovilidadIntEnt;
use Illuminate\Http\Request;

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


    public function store(Request $request)
    {
        $mov = new MovilidadIntEnt();
        $mov->tipoPersona = $request->post('mie_adminstudoc');
        $mov->nombrePersona = $request->post('mie_name');
        $mov->titulosOb = $request->post('mie_titulos');
        $mov->instEntOrig = $request->post('mie_instent');
        $mov->paisOrig = $request->post('mie_pais');
        $mov->activo = $request->post('mie_activo');
        $mov->fecha = $request->post('mie_fecha');
        $mov->vigencia = $request->post('mie_vigencia');
        $mov->sedeReg = $request->post('mie_sedereg');
        $mov->objeto = $request->post('mie_objeto');
        $mov->resultado = $request->post('mie_result');
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
