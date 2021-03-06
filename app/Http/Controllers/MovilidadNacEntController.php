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
        $request->validate([
            'mne_adminstudoc' => 'required',
            'mne_firstname' => 'required',
            'mne_lastname' => 'required',
            'mne_instent' => 'required',
            'mne_activo' => 'required',
            'mne_fecha' => 'required',
            'mne_vigencia' => 'required',
        ]);

        $mov = new MovilidadNacEnt();
        $mov->tipoPersona = $request->post('mne_adminstudoc');
        $mov->firstNameSup = $request->post('mne_firstname');
        $mov->secnameSup = $request->post('mne_secondname');
        $mov->lastNameSup = $request->post('mne_lastname');
        $mov->titulosOb = $request->post('mne_titulos');
        $mov->activo = $request->post('mne_activo');
        $mov->fecha = $request->post('mne_fecha');
        $mov->vigencia = $request->post('mne_vigencia');
        $mov->sedeReg = $request->post('mne_sedereg');
        $mov->objeto = $request->post('mne_objeto');
        $mov->resultado = $request->post('mne_result');
        $mov->instEnt_id = $request->post('mne_instent');
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
