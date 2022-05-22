<?php

namespace App\Http\Controllers;

use App\Models\InstEntNac;
use App\Models\InstitucionEntidadInt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstEntController extends Controller
{


    public function store_int(Request $request)
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
        $instentInt->telefono = $request->post('ints_telefonoInt');
        $instentInt->email = $request->post('int_emailInt');
        $instentInt->user_id = auth()->user()->id;

        $instentInt->save();

        return redirect()->route('login.activites')->with('message', 'Institución creada con éxito!');
    }

    public function store_nac(Request $request)
    {
        $request->validate([
            'instentnameNac' => 'required',
            'emailNac' => 'required',
        ]);

        $files = [];

        if ($request->hasFile('inst_docsoporteNac')) {
            foreach ($request->file('inst_docsoporteNac') as $file) {
                $name = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path('files/institucionesNac'), $name);
                $files[] = $name;
            }
        }

        $instentNact = new InstEntNac();
        $instentNact->nombre = $request->post('instentnameNac');
        $instentNact->ciudad = $request->post('dtpcitymunNac');
        $instentNact->nit = $request->post('nitNac');
        $instentNact->telefono = $request->post('telefonoNac');
        $instentNact->email = $request->post('emailNac');
        $instentNact->docSoportes = json_encode($files);
        $instentNact->user_id = auth()->user()->id;


        $instentNact->save();

        return redirect()->route('login.activites')->with('success', 'Agregado con exito!');
    }

    public function download_nac($file)
    {
        return response()->download(public_path('files/institucionesNac/' . $file));
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
