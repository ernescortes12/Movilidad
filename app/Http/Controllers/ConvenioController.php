<?php

namespace App\Http\Controllers;

use App\Models\ConvenioInt;
use App\Models\ConvenioNac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConvenioController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('convenios.create');
    }


    public function store_nac(Request $request)
    {
        $request->validate([
            'conv_fechaInicioNac' => 'required',
            'conv_tipoNac' => 'required',
            'conv_superNac' => 'required',
            'con_instEntNac' => 'required',
            'conv_vigenciaNac' => 'required',
        ]);

        $files = [];

        if ($request->hasFile('conv_docsoporteNac')) {
            foreach ($request->file('conv_docsoporteNac') as $file) {
                $name = time() . "_" . $file->getClientOriginalName();
                $file->move(public_path('files/conveniosNac'), $name);
                $files[] = $name;
            }
        }

        // $codigos = DB::select('select convenio_nacs.codigo from convenio_nacs');
        // $x = 0
        // while($x<)

        $convNac = new ConvenioNac();
        $convNac->fechaInicio = $request->post('conv_fechaInicioNac');
        $convNac->tipo = $request->post('conv_tipoNac');
        $convNac->supervisor = $request->post('conv_superNac');
        $convNac->instEntNac = $request->post('con_instEntNac');
        $convNac->dtpcitymun = $request->post('conv_dtpcitymunNac');
        $convNac->nit = $request->post('conv_nitNac');
        $convNac->recursos = $request->post('conv_recursosNac');
        $convNac->vigencia = $request->post('conv_vigenciaNac');
        $convNac->docSoportes = json_encode($files);
        $convNac->user_id = auth()->user()->id;

        $convNac->save();

        return redirect()->route('login.activites')->with('success', 'Agregado con éxito!');
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


        // Multiples

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

        // Multiple institutes selected
        $instSelected = [];
        if ($request->post('conv_intentInt') != null) {
            foreach ($request->post('conv_intentInt') as $instEnts) {
                $instSelected[] = $instEnts;
            }
            // $instEnts = implode(', ', $request->post('conv_intentInt'));
        }

        $convInt->añoVin = $request->post('conv_añovinInt');
        $convInt->tipo = $request->post('conv_tipoInt');
        $convInt->vigencia = $request->post('con_vigenciaInt');
        $convInt->int_ent = json_encode($instSelected);
        $convInt->programa = $request->post('conv_programInt');
        $convInt->objeto = $request->post('conv_objetoInt');
        $convInt->alcance = $request->post('conv_alcanceInt');
        $convInt->activo = $request->post('con_activoNoInt');
        $convInt->fechaInicio = $request->post('conv_datestartInt');
        $convInt->vig_pro = $request->post('con_vigproInt');
        $convInt->nombProsesion = json_encode($files_nomPos);
        $convInt->certFacultad = json_encode($files_certFac);
        $convInt->actaSeguimiento = json_encode($files_actaDoc);
        $convInt->user_id = auth()->user()->id;

        $convInt->save();

        return redirect()->route('login.activites')->with('success', 'Agregado con éxito!');
    }


    public function download_nac($file)
    {
        return response()->download(public_path('files/conveniosNac/' . $file));
    }

    public function download_int($file)
    {
        return response()->download(public_path('files/conveniosInt/' . $file));
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
