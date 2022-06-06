<?php

namespace App\Http\Controllers;

use App\Models\ConvenioInt;
use App\Models\ConvenioNac;
use App\Models\InstEntNac;
use App\Models\InstitucionEntidadInt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConvenioController extends Controller
{
    // Internacional
    public function index_int()
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


    public function store_int(Request $request)
    {

        $request->validate([
            'conv_añovinInt' => 'required',
            'conv_tipoInt' => 'required',
            'con_vigenciaInt' => 'required',
            'conv_intentInt' => 'required',
            'conv_programInt' => 'required',
            'con_activoNoInt' => 'required',
            'conv_datestartInt' => 'required',
            'con_vigproInt' => 'required',
            'conv_docidentInt' => 'required|mimes:pdf',
            'conv_nomposInt' => 'required',
            'conv_constregInt' => 'required|mimes:pdf',
            'conv_certfacInt' => 'required',
            'conv_infestudiosInt' => 'mimes:pdf',
            'conv_minInt' => 'required|mimes:pdf',
            'conv_garInt' => 'mimes:pdf',
            'conv_resInt' => 'required|mimes:pdf',
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
        $convInt->activo = $request->post('con_activoNoInt');
        $convInt->fechaInicio = $request->post('conv_datestartInt');
        $convInt->vig_pro = $request->post('con_vigproInt');
        $convInt->nombProsesion = implode(',', $files_nomPos);
        $convInt->certFacultad = implode(',', $files_certFac);
        $convInt->actaSeguimiento = implode(',', $files_actaDoc);
        $convInt->user_id = auth()->user()->id;

        $convInt->save();

        return redirect()->route('login.activites')
            ->with('success', 'Convenio con código ' . implode("-", $codigo) . ' creado correctamente!');
    }


    public function download_int($file)
    {
        return response()->download(public_path('files/conveniosInt/' . $file));
    }

    public function edit_int($conv_id)
    {
        $instEntInt = InstitucionEntidadInt::where('estado', 1)->get();
        $convs = ConvenioInt::findOrFail($conv_id);
        return view('convenios.editint', compact(['instEntInt', 'convs']));
    }


    public function update_int(Request $request, $conv_id)
    {
        $request->validate([
            'conv_añovinInt' => 'required',
            'conv_tipoInt' => 'required',
            'con_vigenciaInt' => 'required',
            'conv_intentInt' => 'required',
            'conv_programInt' => 'required',
            'con_activoNoInt' => 'required',
            'conv_datestartInt' => 'required',
            'con_vigproInt' => 'required',
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


    public function destroy_int($conv_id)
    {
        $conv = ConvenioInt::findOrFail($conv_id);
        $conv->estado = 0;
        $conv->save();
        return redirect('/activities/cons_convenios_int')
            ->with('success', 'Convenio con código ' . $conv->codigo . ' eliminado correctamente!');
    }


    // Nacional
    public function index_nac()
    {
        $convNacs = ConvenioNac::where('estado', 1)->get();
        return view('convenios.indexnac', compact('convNacs'));
    }

    public function store_nac(Request $request)
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
        $convNac->instEntNac = $request->post('con_instEntNac');
        $convNac->dtpcitymun = $request->post('conv_dtpcitymunNac');
        $convNac->nit = $request->post('conv_nitNac');
        $convNac->recursos = $request->post('conv_recursosNac');
        $convNac->vigencia = $request->post('conv_vigenciaNac');
        $convNac->docSoportes = implode(',', $files);
        $convNac->user_id = auth()->user()->id;

        $convNac->save();

        return redirect()->route('login.activites')
            ->with('success', 'Convenio con código ' . implode("-", $codigo) . ' creado correctamente!');
    }


    public function download_nac($file)
    {
        return response()->download(public_path('files/conveniosNac/' . $file));
    }


    public function edit_nac($conv_id)
    {
        $instEntNacs = InstEntNac::where('estado', 1)->get();
        $convs = ConvenioNac::findOrFail($conv_id);
        return view('convenios.editnac', compact(['instEntNacs', 'convs']));
    }


    public function update_nac(Request $request, $conv_id)
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
        $conv->instEntNac = $request->con_instEntNac;
        $conv->dtpcitymun = $request->conv_dtpcitymunNac;
        $conv->nit = $request->conv_nitNac;
        $conv->recursos = $request->conv_recursosNac;
        $conv->vigencia = $request->conv_vigenciaNac;
        $conv->save();
        return redirect('/activities/cons_convenios_nac')
            ->with('success', 'Convenio actualizado correctamente!');
    }


    public function destroy_nac($conv_id)
    {
        $conv = ConvenioNac::findOrFail($conv_id);
        $conv->estado = 0;
        $conv->save();
        return redirect('/activities/cons_convenios_nac')
            ->with('success', 'Convenio con código ' . $conv->codigo . ' eliminado correctamente!');
    }
}
