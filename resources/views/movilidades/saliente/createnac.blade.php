@extends('layouts.inst_conv_mov')
@section('title', 'Registro Movilidad Saliente Nacional')

@section('content')
    <form action="{{ route('movilidadNacSal.store') }}" method="POST" class="border border-2 rounded-3 shadow-lg" style="width: 70%">
        @csrf
        <div class="row mt-3 p-3 shadow-lg rounded-3 titles">
            <div class="offset-1 col-10">
                <h4 class="text-center" id="ori">Movilidad Saliente Nacional</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-2">
                <select  class="form-select border border-dark" name="mns_adminstudoc" id="mns_adminstudoc" onchange="activateDegreeMNS()">
                    <option value="" selected>-- Tipo de persona --</option>
                    <option value="Administrativo" {{ old('mns_adminstudoc') == "Administrativo" ? 'selected': '' }}>Administrativo</option>
                    <option value="Estudiante" {{ old('mns_adminstudoc') == "Estudiante" ? 'selected': '' }}>Estudiante</option>
                    <option value="Docente" {{ old('mns_adminstudoc') == "Docente" ? 'selected': '' }}>Docente</option>
                </select>
                @error('mns_adminstudoc')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <input type="text" class="form-control border border-dark" placeholder="* Nombre (Administrativo, Docente o Estudiante)..." name="mns_name" id="mns_name" value="{{ old('mns_name') }}">
                @error('mns_name')
                    <span class="text-danger">* {{$message}}</span>
                @enderror 
            </div>
            <div class="col-4">
                <input type="text" class="form-control border border-dark" placeholder="Titulos obtenidos..." disabled title="Solo se habilitará para Docentes" name="mns_titulos" id="mns_titulos" value="{{ old('mns_titulos') }}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-4">
                <select class="form-select border border-dark" name="mns_instent" id="mns_instent">
                    <option value="" selected>-- Institución o Entidad destino --</option>
                    @foreach ($instEnt as $item)
                        <option value="{{ $item->nombre }}" {{ old('mns_instent') == $item->nombre ? 'selected': '' }}>{{ $item->nombre }}</option>
                    @endforeach
                </select>
                @error('mns_instent')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <select class="form-select border border-dark" name="mns_ciudad" id="mns_ciudad">
                    <option value="">-- Ciudad destino --</option>
                    @include('pais_ciudad.ciudad')
                </select>
                @error('mns_ciudad')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-2">
                <select class="form-select border border-dark" name="mns_activo" id="mns_activo">
                    <option value="" selected>-- Activo en la INST/ENT --</option>
                    <option value="Sí" {{ old('mns_activo') == "Sí" ? 'selected': '' }}>Sí</option>
                    <option value="No" {{ old('mns_activo') == "No" ? 'selected': '' }}>No</option>
                </select>
                @error('mns_activo')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-3">
                <label for="" class="mb-1">* Fecha de la movilidad: </label>
                <input type="date" class="form-control border border-dark" name="mns_fecha" id="mns_fecha" value="{{ old('mns_fecha') }}">
                @error('mns_fecha')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-3">
                <input type="text" class="form-control border border-dark" placeholder="* Vigencia..." name="mns_vigencia" id="mns_vigencia" value="{{ old('mns_vigencia') }}">
                @error('mns_vigencia')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <input type="text" class="form-control border border-dark" placeholder="Sede o regional" name="mns_sedereg" id="mns_sedereg" value="{{ old('mns_sedereg') }}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-5">
                <textarea class="form-control border border-dark" placeholder="Breve objeto..." name="mns_objeto" id="mns_objeto">{{ old('mns_objeto') }}</textarea>
            </div>
            <div class="col-5">
                <textarea class="form-control border border-dark" placeholder="Resultado" name="mns_result" id="mns_result">{{ old('mns_result') }}</textarea>
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