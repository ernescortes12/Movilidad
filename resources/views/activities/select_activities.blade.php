@extends('layouts.app')
@section('title', 'Actividades')

@section('act_content')
    <form name="f" action="" class="border border-2 rounded-3 shadow-lg act_form" style="height: 370;" onchange="activate()">
        @csrf
        <img src="{{asset('images/index/header_login.jpg')}}" alt="" class="img-fluid m-0 rounded-top">
        @if (auth()->user()->rol_id == '1' or auth()->user()->rol_id == '5')
            <div class="row mt-3">
                <div class="col">
                    <p class="text-center">Coordinacion u otra dependencia</p>
                </div>
            </div>
            {{-- Accion CRUD con restricciones de rol --}}
            <div class="offset-1 col-10 mt-3">
                <select class="form-select border-dark" name="c_o_actions" id="c_o_actions" onchange="loadActions()">
                    <option value="">-- Seleccione una opción --</option>
                    <option value="1">Registrar</option>
                    <option value="2">Consultar</option>
                </select>
            </div>
            {{-- Sobre que con restricciones de rol --}}
            <div class="offset-1 col-10 mt-5">
                <select class="form-select border-dark" name="c_o_about_what" id="c_o_about_what">
                    <option value="">-- Seleccione una opción --</option>
                </select>
            </div>
            <div class="offset-3 col-6 mt-5 mb-4">
                <button class="w-100 btn btn-primary rounded-pill border border-dark">Siguiente</button>
            </div>
            
        @elseif(auth()->user()->rol_id == '2' or auth()->user()->rol_id=='3')

            <div class="row mt-3">
                <div class="col">
                    @if (auth()->user()->rol_id == '2')
                        <h4 class="text-center">ORI</h4>
                    @elseif(auth()->user()->rol_id=='3')
                        <h4 class="text-center">DIE</h4>
                    @endif
                </div>
            </div>
            
            {{-- Accion CRUD con restricciones de rol --}}
            <div class="offset-1 col-10 mt-3">
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
                    <option value="convenios">Convenio</option>
                    <option value="instituciones">Institución</option>
                    <option value="movilidades">Movilidad</option>
                </select>
            </div>
            <div class="offset-1 col-10 mt-5">
                <select class="form-select border border-dark"  name="nacoInt" id="nacoInt" disabled>
                    <option value="">-- Seleccione una opción --</option>
                    <option value="internacional">Internacional</option>
                    <option value="nacional">Nacional</option>
                </select>
            </div>
            <div class="offset-3 col-6 mt-5 mb-4">
                <button class="w-100 btn btn-primary rounded-pill border border-dark" id="ori_enlace" type="submit">Siguiente</button>
            </div>

        @elseif(auth()->user()->rol_id == '4')
            <div class="row mt-3">
                <div class="col">
                    <h4 class="text-center">Decano</h4>
                </div>
            </div>
            <div class="offset-1 col-10 mt-3">
                <select class="form-select border-dark" name="dec_actions" id="dec_actions">
                    <option value="">-- Seleccione una opción --</option>
                    <option value="1">Consultar</option>
                </select>
            </div>
            {{-- Sobre que con restricciones de rol --}}
            <div class="offset-1 col-10 mt-5">
                <select class="form-select border-dark" name="dec_about_what" id="dec_about_what">
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