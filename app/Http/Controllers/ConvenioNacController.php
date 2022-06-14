<?php

namespace App\Http\Controllers;

use App\Models\ConvenioNac;
use App\Models\InstEntNac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConvenioNacController extends Controller
{
    public function index()
    {
        $convNacs = DB::table('convenio_nacs')
            ->join('inst_ent_nacs', 'convenio_nacs.instEntNac_id', '=', 'inst_ent_nacs.id')
            ->select('convenio_nacs.*', 'inst_ent_nacs.nombre', 'inst_ent_nacs.ciudad')->get();
        return view('convenios.indexnac', compact('convNacs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'conv_fechaInicioNac' => 'required',
            'conv_tipoNac' => 'required',
            'conv_superNac' => 'required',
            'con_instEntNac' => 'required',
            'conv_vigenciaNac' => 'required',
            'conv_docsoporteNac' => 'required'
        ]);

        $files = [];

        if ($request->hasFile('conv_docsoporteNac')) {
            foreach ($request->file('conv_docsoporteNac') as $file) {
                $name = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path('files/conveniosNac'), $name);
                $files[] = $name;
            }
        }

        $c_convs = ConvenioNac::get('codigo');

        $convNac = new ConvenioNac();

        if ($c_convs->isEmpty()) {
            $codigo = [310, 1000];
            $convNac->codigo = implode('-', $codigo);
        } else {
            $last = $c_convs->last();
            $codigo = explode('-', $last->codigo);
            $codigo[1] += 1;
            $convNac->codigo = implode('-', $codigo);
        }


        $convNac->fechaInicio = $request->post('conv_fechaInicioNac');
        $convNac->tipo = $request->post('conv_tipoNac');
        $convNac->supervisor = $request->post('conv_superNac');
        $convNac->recursos = $request->post('conv_recursosNac');
        $convNac->vigencia = $request->post('conv_vigenciaNac');
        $convNac->docSoportes = implode(',', $files);
        $convNac->instEntNac_id = $request->post('con_instEntNac');
        $convNac->user_id = auth()->user()->id;

        $convNac->save();

        return redirect()->route('login.activites')
            ->with('success', 'Convenio con código ' . implode("-", $codigo) . ' creado correctamente!');
    }


    public function download($file)
    {
        return response()->download(public_path('files/conveniosNac/' . $file));
    }


    public function edit($conv_id)
    {
        $instEntNacs = InstEntNac::where('estado', 1)->get();
        $convs = ConvenioNac::findOrFail($conv_id);
        return view('convenios.editnac', compact(['instEntNacs', 'convs']));
    }


    public function update(Request $request, $conv_id)
    {
        $request->validate([
            'conv_fechaInicioNac' => 'required',
            'conv_tipoNac' => 'required',
            'conv_superNac' => 'required',
            'con_instEntNac' => 'required',
            'conv_vigenciaNac' => 'required',
        ]);

        $conv = ConvenioNac::findOrFail($conv_id);
        $conv->fechaInicio = $request->conv_fechaInicioNac;
        $conv->tipo = $request->conv_tipoNac;
        $conv->supervisor = $request->conv_superNac;
        $conv->recursos = $request->conv_recursosNac;
        $conv->vigencia = $request->conv_vigenciaNac;
        $conv->instEntNac_id = $request->con_instEntNac;
        $conv->save();
        return redirect('/activities/cons_convenios_nac')
            ->with('success', 'Convenio actualizado correctamente!');
    }


    public function destroy($conv_id)
    {
        $conv = ConvenioNac::findOrFail($conv_id);
        $conv->estado = 0;
        $conv->save();
        return redirect('/activities/cons_convenios_nac')
            ->with('success', 'Convenio con código ' . $conv->codigo . ' eliminado correctamente!');
    }
}
