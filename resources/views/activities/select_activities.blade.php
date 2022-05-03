@extends('layouts.app')
@section('title', 'Actividades')

@section('act_content')
    <form name="f" action="" class="border border-2 rounded-3 shadow-lg act_form" style="height: 370;">
        @csrf
        <img src="{{asset('images/index/header_login.jpg')}}" alt="" class="img-fluid m-0 rounded-top">
        @if (auth()->user()->rol_id == '1' or auth()->user()->rol_id == '5')

            <p class="text-center">Coordinacion u otra dependencia</p>
            {{-- Accion CRUD con restricciones de rol --}}
            <div class="offset-1 col-10 mt-5">
                <select class="form-select" name="c_o_actions" id="c_o_actions" onchange="loadActions()">
                    <option value="0">-- Seleccione una opción --</option>
                    <option value="1">Registrar</option>
                    <option value="2">Consultar</option>
                </select>
            </div>
            {{-- Sobre que con restricciones de rol --}}
            <div class="offset-1 col-10 mt-5">
                <select class="form-select" name="c_o_about_what" id="c_o_about_what">
                    <option value="-">-- Seleccione una opción --</option>
                </select>
            </div>
            <div class="offset-3 col-6 mt-5 mb-4">
                <button class="w-100 btn btn-primary rounded-pill border border-dark">Siguiente</button>
            </div>
            
        @elseif(auth()->user()->rol_id == '2' or auth()->user()->rol_id=='3')

            @if (auth()->user()->rol_id == '2')
                <p class="text-center">ORI</p>
            @elseif(auth()->user()->rol_id=='3')
                <p class="text-center">DIE</p>
            @endif
            {{-- Accion CRUD con restricciones de rol --}}
            <div class="offset-1 col-10 mt-5">
                <select class="form-select border border-dark" name="actions" id="actions" onchange="loadActivities()">
                    <option selected value="">-- Seleccione una opción --</option>
                    <option value="registrar">Registrar</option>
                    <option value="consultar">Consultar</option>
                </select>
            </div>
            {{-- Sobre que con restricciones de rol --}}
            <div class="offset-1 col-10 mt-5">
                <select class="form-select border border-dark" name="about_what" id="about_what">
                    <option selected value="">-- Seleccione una opción --</option>
                    <option value="convenios">Convenios</option>
                    <option value="instituciones">Instituciones</option>
                    <option value="movilidades">Movilidades</option>
                </select>
            </div>
            <div class="offset-3 col-6 mt-5 mb-4">
                <button class="w-100 btn btn-primary rounded-pill border border-dark" id="ori_enlace" type="submit">Siguiente</button>
            </div>

        @elseif(auth()->user()->rol_id == '4')

            <p class="text-center">Decano</p>
            <div class="offset-1 col-10 mt-5">
                <select class="form-select" name="dec_actions" id="dec_actions">
                    <option value="0">-- Seleccione una opción --</option>
                    <option value="1">Consultar</option>
                </select>
            </div>
            {{-- Sobre que con restricciones de rol --}}
            <div class="offset-1 col-10 mt-5">
                <select class="form-select" name="dec_about_what" id="dec_about_what">
                    <option selected>-- Seleccione una opción --</option>
                    <option value="1">Movilidades</option>
                </select>
            </div>
            <div class="offset-3 col-6 mt-5 mb-4">
                <button class="w-100 btn btn-primary rounded-pill border border-dark">Siguiente</button>
            </div>
        @endif

        

    </form>
    
@endsection