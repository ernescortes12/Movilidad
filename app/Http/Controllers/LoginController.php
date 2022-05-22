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
                $instEntNacs = DB::select('select inst_ent_nacs.nombre from inst_ent_nacs');
                $instEntInt = DB::select('select institucion_entidad_ints.nombre from institucion_entidad_ints');
                return view('convenios.create', compact(['instEntNacs', 'instEntInt']));
            } else if ($actions == "registrar" && $about_what == "instituciones") {
                return view('instituciones.create');
            } else if ($actions == "consultar" && $about_what == "instituciones" && $nacoInt == "internacional") {
                $instInts = InstitucionEntidadInt::all();
                return view('instituciones.indexint', compact('instInts'));
            } else if ($actions == "consultar" && $about_what == "instituciones" && $nacoInt == "nacional") {
                $intNacs = InstEntNac::all();
                return view('instituciones.indexnac', compact('intNacs'));
            } else if ($actions == "consultar" && $about_what == "convenios" && $nacoInt == "internacional") {
                $convInts = ConvenioInt::all();
                return view('convenios.indexint', compact('convInts'));
            } else if ($actions == "consultar" && $about_what == "convenios" && $nacoInt == "nacional") {
                $convNacs = ConvenioNac::all();
                return view('convenios.indexnac', compact('convNacs'));
            }
        }
        return view('activities.select_activities');
    }
}
