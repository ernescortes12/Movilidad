<?php

namespace App\Http\Controllers;

use App\Models\InstitucionEntidadInt;
use Illuminate\Http\Request;

class InstEntIntController extends Controller
{
    // Internacional
    public function index(Request $request)
    {
        $instInts = InstitucionEntidadInt::where('estado', 1)->get();
        return view('instituciones.indexint', compact('instInts'));
    }


    public function create(Request $request)
    {
        return view('instituciones.createint');
    }


    public function store(Request $request)
    {
        $request->validate([
            'instentnameInt' => 'required',
            'inst_paisInt' => 'required',
            'ints_cityInt' => 'required',
            'int_emailInt' => 'required|email',
        ]);

        $instentInt = new InstitucionEntidadInt();
        $instentInt->nombre = $request->post('instentnameInt');
        $instentInt->pais = $request->post('inst_paisInt');
        $instentInt->ciudad = $request->post('ints_cityInt');
        $instentInt->nit = $request->post('ints_nitInt');
        $instentInt->telefono = $request->post('ints_telefonoInt');
        $instentInt->email = $request->post('int_emailInt');
        $instentInt->user_id = auth()->user()->id;


        $instentInt->save();

        return redirect()->route('login.activites')
            ->with('success', 'Institución/Entidad creada correctamente!');
    }


    public function edit($id)
    {
        $instInt = InstitucionEntidadInt::find($id);
        return view('instituciones.editint', compact('instInt'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'instentnameInt' => 'required',
            'inst_paisInt' => 'required',
            'ints_cityInt' => 'required',
            'int_emailInt' => 'required|email',
        ]);

        $inst = InstitucionEntidadInt::find($id);
        $inst->nombre = $request->instentnameInt;
        $inst->pais = $request->inst_paisInt;
        $inst->ciudad = $request->ints_cityInt;
        $inst->nit = $request->ints_nitInt;
        $inst->telefono = $request->ints_telefonoInt;
        $inst->email = $request->int_emailInt;

        $inst->save();

        return redirect('/activities/cons_instituciones_int')
            ->with('success', 'Institución/Entidad actualizada correctamente!');
    }


    public function destroy($id)
    {
        $inst = InstitucionEntidadInt::findOrFail($id);
        $inst->estado = 0;
        $inst->save();
        return redirect('/activities/cons_instituciones_int')
            ->with('success', 'Institución/Entidad con código ' . $inst->id . ' eliminada correctamente!');
    }
}
