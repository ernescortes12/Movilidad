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

        $actions = $request->input('actions');
        $about_what = $request->input('about_what');
        $nacoInt = $request->input('nacoInt');


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
            }
        }
        return view('activities.select_activities');
    }
}
