<?php

namespace App\Http\Controllers;

use App\Models\InstEntNac;
use App\Models\InstitucionEntidadInt;
use Illuminate\Http\Request;

class InstEntController extends Controller
{
    // Internacional
    public function index_int(Request $request)
    {
        $instInts = InstitucionEntidadInt::where('estado', 1)->get();
        return view('instituciones.indexint', compact('instInts'));
    }


    public function create(Request $request)
    {
        return view('instituciones.create');
    }


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

        return redirect()->route('login.activites')
            ->with('success', 'Institución/Entidad creada correctamente!');
    }


    public function edit_int($id)
    {
        $instInt = InstitucionEntidadInt::find($id);
        return view('instituciones.editint', compact('instInt'));
    }


    public function update_int(Request $request, $id)
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
        $inst->telefono = $request->ints_telefonoInt;
        $inst->email = $request->int_emailInt;

        $inst->save();

        return redirect('/activities/cons_instituciones_int')
            ->with('success', 'Institución/Entidad actualizada correctamente!');
    }


    public function destroy_int($id)
    {
        $inst = InstitucionEntidadInt::findOrFail($id);
        $inst->estado = 0;
        $inst->save();
        return redirect('/activities/cons_instituciones_int')
            ->with('success', 'Institución/Entidad con código ' . $inst->id . ' eliminada correctamente!');
    }

    //Nacional
    public function index_nac(Request $request)
    {
        $intNacs = InstEntNac::where('estado', 1)->get();
        return view('instituciones.indexnac', compact('intNacs'));
    }


    public function store_nac(Request $request)
    {
        $request->validate([
            'instentnameNac' => 'required',
            'dtpcitymunNac' => 'required',
            'emailNac' => 'required',
            'inst_docsoporteNac' => 'required|array',
        ]);

        // Guardar multiples archivos
        // Para acceder a estos se debe utilizar explode (método inverso al implode)
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
        $instentNact->docSoportes = implode(",", $files);
        $instentNact->user_id = auth()->user()->id;


        $instentNact->save();

        return redirect()->route('login.activites')->with('success', 'Institución/Entidad creada correctamente!');
    }


    public function download_nac($file)
    {
        return response()->download(public_path('files/institucionesNac/' . $file));
    }


    public function edit_nac($id)
    {
        $instNac = InstEntNac::find($id);
        return view('instituciones.editnac', compact('instNac'));
    }


    public function update_nac(Request $request, $inst_id)
    {
        $request->validate([
            'instentnameNac' => 'required',
            'dtpcitymunNac' => 'required',
            'emailNac' => 'required',
        ]);

        $inst = InstEntNac::find($inst_id);
        $inst->nombre = $request->instentnameNac;
        $inst->ciudad = $request->dtpcitymunNac;
        $inst->nit = $request->nitNac;
        $inst->telefono = $request->telefonoNac;
        $inst->email = $request->emailNac;

        $inst->save();

        return redirect('/activities/cons_instituciones_nac')
            ->with('success', 'Institución/Entidad editada correctamente!');
    }


    public function destroy_nac($id)
    {
        $inst = InstEntNac::findOrFail($id);
        $inst->estado = 0;
        $inst->save();
        return redirect('/activities/cons_instituciones_nac')
            ->with('success', 'Institución/Entidad con código ' . $inst->id . ' eliminada correctamente!');
    }
}
