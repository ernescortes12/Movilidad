<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    function index()
    {
        $roles = Rol::all();
        return view('activities/select_activitie',);
    }
}
