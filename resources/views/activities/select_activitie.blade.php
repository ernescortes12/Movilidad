@extends('layouts.app')
@section('title', 'Actividades')

@section('act_content')
    <form action="" class="border border-2 rounded-3 shadow-lg" style="height: 400px;">
        @if (auth()->user()->rol_id == '1')
            {{-- Accion --}}
            <select class="form-select" id="" aria-label="Default select example">
                <option selected>--Seleccione una opción--</option>
            </select>
            {{--  --}}
        @elseif(auth()->user()->rol_id == '2')

        <p>ORI</p>

        @elseif(auth()->user()->rol_id == '3')

        <p>DIE</p>

        @else

        <p>Otras dependencias</p>
            
        @endif

        

    </form>
    
@endsection