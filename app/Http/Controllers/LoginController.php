<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

        $about_what = $request->input('about_what');
        $actions = $request->input('actions');


        if ($about_what != ""  || $actions != "") {
            if ($actions == "registrar" && $about_what == "convenios") {
                return view('convenios.create');
            } else if ($actions == "registrar" && $about_what == "instituciones") {
                return view('instituciones.create');
            }
        }
        return view('activities.select_activities');
    }
}
