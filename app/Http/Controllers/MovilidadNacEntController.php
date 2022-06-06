<?php

namespace App\Http\Controllers;

use App\Models\InstEntNac;
use App\Models\MovilidadNacEnt;
use Illuminate\Http\Request;

class MovilidadNacEntController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $instEnt =  InstEntNac::where('estado', 1)->get();
        return view('movilidades.entrante.createnac', compact('instEnt'));
    }


    public function store(Request $request)
    {
        $mov = new MovilidadNacEnt();
        $mov->tipoPersona = $request->post('mne_adminstudoc');
        $mov->nombrePersona = $request->post('mne_name');
        $mov->titulosOb = $request->post('mne_titulos');
        $mov->instEntOrig = $request->post('mne_instent');
        $mov->ciudadOrig = $request->post('mne_ciudad');
        $mov->activo = $request->post('mne_activo');
        $mov->fecha = $request->post('mne_fecha');
        $mov->vigencia = $request->post('mne_vigencia');
        $mov->sedeReg = $request->post('mne_sedereg');
        $mov->objeto = $request->post('mne_objeto');
        $mov->resultado = $request->post('mne_result');
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
