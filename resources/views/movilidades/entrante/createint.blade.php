@extends('layouts.inst_conv_mov')
@section('title', 'Registro Movilidad Entrante Internacional')

@section('content')
    <form action="{{ route('movilidadIntEnt.store') }}" method="POST" class="border border-2 rounded-3 shadow-lg" style="width: 70%">
        @csrf
        <div class="row mt-3 p-3 shadow-lg rounded-3 titles">
            <div class="offset-1 col-10">
                <h4 class="text-center" id="ori">Movilidad Entrante Internacional</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-2">
                <select  class="form-select border border-dark" name="mie_adminstudoc" id="mie_adminstudoc" onchange="activateDegreeMIE()">
                    <option value="" selected>-- Tipo de persona --</option>
                    <option value="Administrativo" {{ old('mie_adminstudoc') == "Administrativo" ? 'selected': '' }}>Administrativo</option>
                    <option value="Estudiante" {{ old('mie_adminstudoc') == "Estudiante" ? 'selected': '' }}>Estudiante</option>
                    <option value="Docente" {{ old('mie_adminstudoc') == "Docente" ? 'selected': '' }}>Docente</option>
                </select>
            </div>
            <div class="col-4">
                <input type="text" class="form-control border border-dark" placeholder="* Nombre (Administrativo, Docente o Estudiante)..." name="mie_name" id="mie_name" value="{{ old('mie_name') }}">
            </div>
            <div class="col-4">
                <input type="text" class="form-control border border-dark" placeholder="Titulos obtenidos..." title="Solo se habilitará para Docentes" disabled name="mie_titulos" id="mie_titulos" value="{{ old('mie_titulos') }}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-4">
                <select class="form-select border border-dark" name="mie_instent" id="mie_instent">
                    <option value="" selected>-- Institución o Entidad origen --</option>
                    @foreach ($instEnt as $item)
                        <option value="{{ $item->nombre }}" {{ old('mie_instent') == $item->nombre ? 'selected': '' }}>{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <select class="form-select border border-dark" name="mie_pais" id="mie_pias">
                    <option value="">-- País origen --</option>
                    @include('pais_ciudad.pais')
                </select>
            </div>
            <div class="col-2">
                <select class="form-select border border-dark" name="mie_activo" id="mie_activo">
                    <option value="" selected>-- Activo en la INST/ENT --</option>
                    <option value="Sí" {{ old('mie_activo') == "Sí" ? 'selected': '' }}>Sí</option>
                    <option value="No" {{ old('mie_activo') == "No" ? 'selected': '' }}>No</option>
                </select>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-3">
                <label for="" class="mb-1">* Fecha de la movilidad: </label>
                <input type="date" class="form-control border border-dark" name="mie_fecha" id="mie_fecha" value="{{ old('mie_fecha') }}">
            </div>
            <div class="col-3">
                <input type="text" class="form-control border border-dark" placeholder="* Vigencia..." name="mie_vigencia" id="mie_vigencia" value="{{ old('mie_vigencia') }}">
            </div>
            <div class="col-4">
                <input type="text" class="form-control border border-dark" placeholder="Sede o regional" name="mie_sedereg" id="mie_sedereg" value="{{ old('mie_sedereg') }}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-5">
                <textarea class="form-control border border-dark" placeholder="Breve objeto..." name="mie_objeto" id="mie_objeto">{{ old('mie_objeto') }}</textarea>
            </div>
            <div class="col-5">
                <textarea class="form-control border border-dark" placeholder="Resultado" name="mie_result" id="mie_result">{{ old('mie_result') }}</textarea>
            </div>
        </div>
        <div class="row mt-5 mb-4">
            <div class="offset-1 col-2">
                <a href="{{ route('login.activites') }}" class="text-danger text-decoration-none">Regresar</a>
            </div>
            <div class="offset-5 col-3">
                <button type="submit" class="w-100 btn_1 btn-primary rounded-pill border border-dark">Registrar</button>
            </div>
        </div>
    </form>
@endsection