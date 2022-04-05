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
                'message' => 'Email o contraseña incorrectos',
            ]);
        }
        return redirect()->to('/activities');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
