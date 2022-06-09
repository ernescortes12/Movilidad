<?php

namespace App\Http\Controllers;

use App\Models\ConvenioInt;
use App\Models\ConvenioNac;
use App\Models\InstEntNac;
use App\Models\InstitucionEntidadInt;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function consult()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Email o contraseñas incorrectos, intente de nuevo',
            ]);
        } else {
            return redirect()->to('/activities');
        }
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/');
    }

    public function activity_view(Request $request)
    {
        // Redireccionamiento para ORI y DIE
        $actions = $request->input('actions');
        $about_what = $request->input('about_what');
        $nacoInt = $request->input('nacoInt');
        $entSal = $request->input('entSal');


        if ($about_what != ""  || $actions != "") {
            if ($actions == "registrar" && $about_what == "convenios") {
                return redirect('/activities/registro_convenios');
            } else if ($actions == "registrar" && $about_what == "instituciones") {
                return redirect('/activities/registro_instituciones');
            } else if ($actions == "consultar" && $about_what == "instituciones" && $nacoInt == "internacional") {
                return redirect('/activities/cons_instituciones_int');
            } else if ($actions == "consultar" && $about_what == "instituciones" && $nacoInt == "nacional") {
                return redirect('/activities/cons_instituciones_nac');
            } else if ($actions == "consultar" && $about_what == "convenios" && $nacoInt == "internacional") {
                return redirect('/activities/cons_convenios_int');
            } else if ($actions == "consultar" && $about_what == "convenios" && $nacoInt == "nacional") {
                return redirect('/activities/cons_convenios_nac');
            } else if ($actions == "registrar" && $about_what == "movilidad" && $nacoInt == "nacional" && $entSal == "entrante") {
                return redirect('/activities/registro_movilidad_nac/entrante');
            } else if ($actions == "registrar" && $about_what == "movilidad" && $nacoInt == "nacional" && $entSal == "saliente") {
                return redirect('/activities/registro_movilidad_nac/saliente');
            } else if ($actions == "registrar" && $about_what == "movilidad" && $nacoInt == "internacional" && $entSal == "saliente") {
                return redirect('/activities/registro_movilidad_int/saliente');
            } else if ($actions == "registrar" && $about_what == "movilidad" && $nacoInt == "internacional" && $entSal == "entrante") {
                return redirect('/activities/registro_movilidad_int/entrante');
            }
        }

        // Redireccionamiento para Coordinaciones u otras dependencias
        $c_o_actions = $request->input('c_o_actions');
        $c_o_about_what = $request->input('c_o_about_what');
        $c_o_nacoInt = $request->input('c_o_nacoInt');
        $c_o_entSal = $request->input('c_o_entSal');

        if ($c_o_actions != "" && $c_o_about_what != "") {
            if ($c_o_actions == "registrar" && $c_o_about_what == "movilidad" && $c_o_nacoInt == "internacional" && $c_o_entSal == "entrante") {
                return redirect('/activities/registro_movilidad_int/entrante');
            } else if ($c_o_actions == "registrar" && $c_o_about_what == "movilidad" && $c_o_nacoInt == "internacional" && $c_o_entSal == "saliente") {
                return redirect('/activities/registro_movilidad_int/saliente');
            } else if ($c_o_actions == "registrar" && $c_o_about_what == "movilidad" && $c_o_nacoInt == "nacional" && $c_o_entSal == "entrante") {
                return redirect('/activities/registro_movilidad_nac/entrante');
            } else if ($c_o_actions == "registrar" && $c_o_about_what == "movilidad" && $c_o_nacoInt == "nacional" && $c_o_entSal == "saliente") {
                return redirect('/activities/registro_movilidad_nac/saliente');
            } else if ($c_o_actions == 2 &&  $c_o_about_what == "convenio" && $c_o_nacoInt == "internacional") {
                return redirect('/activities/cons_convenios_int');
            } else if ($c_o_actions == 2 &&  $c_o_about_what == "convenio" && $c_o_nacoInt == "nacional") {
                return redirect('/activities/cons_convenios_nac');
            } else if ($c_o_actions == 2 &&  $c_o_about_what == "institucion" && $c_o_nacoInt == "internacional") {
                return redirect('/activities/cons_instituciones_int');
            } else if ($c_o_actions == 2 &&  $c_o_about_what == "institucion" && $c_o_nacoInt == "nacional") {
                return redirect('/activities/cons_instituciones_nac');
            }
        }
        return view('activities.select_activities');
    }
}
