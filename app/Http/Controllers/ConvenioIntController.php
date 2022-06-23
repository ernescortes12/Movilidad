<?php

namespace App\Http\Controllers;

use App\Models\ConvenioInt;
use App\Models\InstEntNac;
use App\Models\InstitucionEntidadInt;
use Illuminate\Http\Request;

class ConvenioIntController extends Controller
{
    public function index()
    {
        $convInts = ConvenioInt::where('estado', 1)->get();
        return view('convenios.indexint', compact('convInts'));
    }


    public function create()
    {
        $instEntNacs = InstEntNac::where('estado', 1)->get();
        $instEntInt = InstitucionEntidadInt::where('estado', 1)->get();
        return view('convenios.create', compact(['instEntNacs', 'instEntInt']))
            ->with('success', 'Institución/Entidad creada correctamente!');
    }


    public function store(Request $request)
    {

        $request->validate([
            'conv_añovinInt' => 'required',
            'conv_tipoInt' => 'required',
            'con_vigenciaInt' => 'required',
            'conv_intentInt' => 'required',
            'conv_programInt' => 'required',
            'conv_docidentInt' => 'required',
            'conv_nomposInt' => 'required',
            'conv_constregInt' => 'required',
            'conv_certfacInt' => 'required',
            'conv_minInt' => 'required',
            'conv_resInt' => 'required',
        ]);


        $convInt = new ConvenioInt();

        // Simples
        if ($request->hasFile('conv_docidentInt')) {
            $file = time() . "_" . $request->file('conv_docidentInt')->getClientOriginalName();
            $request->file('conv_docidentInt')->move(public_path('files/conveniosInt'), $file);
            $convInt->docSupervisor = $file;
        }

        if ($request->hasFile('conv_constregInt')) {
            $file = time() . "_" . $request->file('conv_constregInt')->getClientOriginalName();
            $request->file('conv_constregInt')->move(public_path('files/conveniosInt'), $file);
            $convInt->constRegistro = $file;
        }

        if ($request->hasFile('conv_infestudiosInt')) {
            $file = time() . "_" . $request->file('conv_infestudiosInt')->getClientOriginalName();
            $request->file('conv_infestudiosInt')->move(public_path('files/conveniosInt'), $file);
            $convInt->infEstudios = $file;
        }

        if ($request->hasFile('conv_minInt')) {
            $file = time() . "_" . $request->file('conv_minInt')->getClientOriginalName();
            $request->file('conv_minInt')->move(public_path('files/conveniosInt'), $file);
            $convInt->minuta = $file;
        }

        if ($request->hasFile('conv_garInt')) {
            $file = time() . "_" . $request->file('conv_garInt')->getClientOriginalName();
            $request->file('conv_garInt')->move(public_path('files/conveniosInt'), $file);
            $convInt->garantias = $file;
        }

        if ($request->hasFile('conv_resInt')) {
            $file = time() . "_" . $request->file('conv_resInt')->getClientOriginalName();
            $request->file('conv_resInt')->move(public_path('files/conveniosInt'), $file);
            $convInt->resnombSupervisor = $file;
        }


        // Guardar multiples archivos
        // Para acceder a estos se debe utilizar explode (método inverso al implode)

        $files_nomPos = [];
        $files_certFac = [];
        $files_actaDoc = [];

        if ($request->hasFile('conv_nomposInt')) {
            foreach ($request->file('conv_nomposInt') as $file) {
                $name = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path('files/conveniosInt'), $name);
                $files_nomPos[] = $name;
            }
        }

        if ($request->hasFile('conv_certfacInt')) {
            foreach ($request->file('conv_certfacInt') as $file) {
                $name = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path('files/conveniosInt'), $name);
                $files_certFac[] = $name;
            }
        }

        if ($request->hasFile('conv_actsegInt')) {
            foreach ($request->file('conv_actsegInt') as $file) {
                $name = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path('files/conveniosInt'), $name);
                $files_actaDoc[] = $name;
            }
        }

        // Multiple institutes select
        $instSelected = [];
        if ($request->post('conv_intentInt') != null) {
            foreach ($request->post('conv_intentInt') as $instEnts) {
                $instSelected[] = $instEnts;
            }
        }

        // Creando el código
        $c_convs = ConvenioInt::get('codigo');

        if ($c_convs->isEmpty()) {
            $codigo = [311, 1000];
            $convInt->codigo = implode('-', $codigo);
        } else {
            $last = $c_convs->last();
            $codigo = explode('-', $last->codigo);
            $codigo[1] += 1;
            $convInt->codigo = implode('-', $codigo);
        }

        $convInt->añoVin = $request->post('conv_añovinInt');
        $convInt->tipo = $request->post('conv_tipoInt');
        $convInt->vigencia = $request->post('con_vigenciaInt');
        $convInt->int_ent = implode(',', $instSelected);
        $convInt->programa = $request->post('conv_programInt');
        $convInt->objeto = $request->post('conv_objetoInt');
        $convInt->alcance = $request->post('conv_alcanceInt');
        $convInt->nombProsesion = implode(',', $files_nomPos);
        $convInt->certFacultad = implode(',', $files_certFac);
        $convInt->actaSeguimiento = implode(',', $files_actaDoc);
        $convInt->user_id = auth()->user()->id;

        $convInt->save();

        return redirect()->route('login.activites')
            ->with('success', 'Convenio con código ' . implode("-", $codigo) . ' creado correctamente!');
    }


    public function download($file)
    {
        return response()->download(public_path('files/conveniosInt/' . $file));
    }

    public function edit($conv_id)
    {
        $instEntInt = InstitucionEntidadInt::where('estado', 1)->get();
        $convs = ConvenioInt::findOrFail($conv_id);
        return view('convenios.editint', compact(['instEntInt', 'convs']));
    }


    public function update(Request $request, $conv_id)
    {
        $request->validate([
            'conv_añovinInt' => 'required',
            'conv_tipoInt' => 'required',
            'con_vigenciaInt' => 'required',
            'conv_intentInt' => 'required',
            'conv_programInt' => 'required',
        ]);

        $conv = ConvenioInt::findOrFail($conv_id);
        $conv->añoVin = $request->conv_añovinInt;
        $conv->tipo = $request->conv_tipoInt;
        $conv->vigencia = $request->con_vigenciaInt;
        $conv->int_ent = implode(',', $request->conv_intentInt);
        $conv->programa = $request->conv_programInt;
        $conv->objeto = $request->conv_objetoInt;
        $conv->alcance = $request->conv_alcanceInt;
        $conv->activo = $request->con_activoNoInt;
        $conv->fechaInicio = $request->conv_datestartInt;
        $conv->vig_pro = $request->con_vigproInt;
        $conv->save();

        return redirect('/activities/cons_convenios_int')
            ->with('success', 'Convenio actualizado correctamente!');
    }


    public function destroy($conv_id)
    {
        $conv = ConvenioInt::findOrFail($conv_id);
        $conv->estado = 0;
        $conv->save();
        return redirect('/activities/cons_convenios_int')
            ->with('success', 'Convenio con código ' . $conv->codigo . ' eliminado correctamente!');
    }
}
