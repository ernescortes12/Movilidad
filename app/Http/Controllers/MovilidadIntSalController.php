<?php

namespace App\Http\Controllers;

use App\Models\InstitucionEntidadInt;
use App\Models\MovilidadIntSal;
use Illuminate\Http\Request;

class MovilidadIntSalController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $instEnt = InstitucionEntidadInt::where('estado', 1)->get();
        return view('movilidades.saliente.createint', compact('instEnt'));
    }


    public function store(Request $request)
    {
        $mov = new MovilidadIntSal();
        $mov->tipoPersona = $request->post('mis_adminstudoc');
        $mov->nombrePersona = $request->post('mis_name');
        $mov->titulosOb = $request->post('mis_titulos');
        $mov->instEntDest = $request->post('mis_instent');
        $mov->paisDest = $request->post('mis_pais');
        $mov->activo = $request->post('mis_activo');
        $mov->fecha = $request->post('mis_fecha');
        $mov->vigencia = $request->post('mis_vigencia');
        $mov->sedeReg = $request->post('mis_sedereg');
        $mov->objeto = $request->post('mis_objeto');
        $mov->resultado = $request->post('mis_result');
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
