<?php

namespace App\Http\Controllers;

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
        $instEntNacs = DB::select('select inst_ent_nacs.id inst_ent_nacs.nombre from inst_ent_nacs');
        return view('convenios.create', ['instEntNacs' => $instEntNacs]);
    }


    public function store_nac(Request $request)
    {
    }


    public function store_int(Request $request)
    {
        //
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
