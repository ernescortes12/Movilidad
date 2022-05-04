<?php

namespace App\Http\Controllers;

use App\Models\InstEntNac;
use Illuminate\Http\Request;

class InstEnt extends Controller
{

    public function index()
    {
        return view('institucion.index');
    }


    public function create()
    {
        return view('institucion.create');
    }


    public function store_nac(Request $request)
    {
        // print_r($_POST);
        $instentNact = new InstEntNac();
        $instentNact->nombre = $request->post('instentnameNac');
        $instentNact->ciudad = $request->post('dtpcitymunNac');
        $instentNact->nit = $request->post('nitNac');
        $instentNact->telefono = $request->post('telefonoNac');
        $instentNact->email = $request->post('emailNac');
        $instentNact->user_id = auth()->user()->id;


        $instentNact->save();

        return redirect()->route('login.activites')->with('success', 'Agregado con exito!');
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
