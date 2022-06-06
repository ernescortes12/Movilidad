<?php

namespace App\Http\Controllers;

use App\Models\InstEntNac;
use App\Models\MovilidadNacSal;
use Illuminate\Http\Request;

class MovilidadNacSalController extends Controller
{
    public function index()
    {
        //
    }


    public function create()
    {
        $instEnt =  InstEntNac::where('estado', 1)->get();
        return view('movilidades.saliente.createnac', compact('instEnt'));
    }


    public function store(Request $request)
    {
        $mov = new MovilidadNacSal();
        $mov->tipoPersona = $request->post('mns_adminstudoc');
        $mov->nombrePersona = $request->post('mns_name');
        $mov->titulosOb = $request->post('mns_titulos');
        $mov->instEntDest = $request->post('mns_instent');
        $mov->ciudadDest = $request->post('mns_ciudad');
        $mov->activo = $request->post('mns_activo');
        $mov->fecha = $request->post('mns_fecha');
        $mov->vigencia = $request->post('mns_vigencia');
        $mov->sedeReg = $request->post('mns_sedereg');
        $mov->objeto = $request->post('mns_objeto');
        $mov->resultado = $request->post('mns_result');
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
