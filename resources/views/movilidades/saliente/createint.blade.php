@extends('layouts.inst_conv_mov')
@section('title', 'Registro Movilidad Saliente Internacional')

@section('content')
    <form action="{{ route('movilidadIntSal.store') }}" method="POST" class="border border-2 rounded-3 shadow-lg" style="width: 70%">
        @csrf
        <div class="row mt-3 p-3 shadow-lg rounded-3 titles">
            <div class="offset-1 col-10">
                <h4 class="text-center" id="ori">Movilidad Saliente Internacional</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-3">
                <select  class="form-select border border-dark" name="mis_adminstudoc" id="mis_adminstudoc" onchange="activateDegreeMIS()">
                    <option value="" selected>-- * Tipo de persona --</option>
                    <option value="Administrativo" {{ old('mis_adminstudoc') == "Administrativo" ? 'selected': '' }}>Administrativo</option>
                    <option value="Estudiante" {{ old('mis_adminstudoc') == "Estudiante" ? 'selected': '' }}>Estudiante</option>
                    <option value="Docente" {{ old('mis_adminstudoc') == "Docente" ? 'selected': '' }}>Docente</option>
                </select>
                @error('mis_adminstudoc')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-5">
                <select class="form-select border border-dark" name="mis_instent" id="mis_instent">
                    <option value="" selected>-- * Institución o Entidad destino --</option>
                    @foreach ($instEnt as $item)
                        <option value="{{ $item->id }}" {{ old('mis_instent') == $item->id ? 'selected': '' }}>{{ $item->nombre }}</option>
                    @endforeach
                </select>
                @error('mis_instent')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-2">
                <select class="form-select border border-dark" name="mis_activo" id="mis_activo">
                    <option value="" selected>-- * Activo en la INST/ENT --</option>
                    <option value="Sí" {{ old('mis_activo') == "Sí" ? 'selected': '' }}>Sí</option>
                    <option value="No" {{ old('mis_activo') == "No" ? 'selected': '' }}>No</option>
                </select>
                @error('mis_activo')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="row">
                    <div class="offset-1 col ">Información del participante (Administrativo, Docente o Estudiante):</div>
                </div>
                <div class="row mt-2">
                    <div class="offset-1 col-2">
                        <input type="text" class="form-control border border-dark" placeholder="* Primer nombre..." name="mis_firstname" id="mis_firstname" value="{{ old('mis_firstname') }}">
                        @error('mis_firstname')
                            <span class="text-danger">* {{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control border border-dark" placeholder="Segundo nombre..." name="mis_secondname" id="mis_secondname" value="{{ old('mis_secondname') }}">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control border border-dark" placeholder="* Apellido(s)..." name="mis_lastname" id="mis_lastname" value="{{ old('mis_lastname') }}">
                        @error('mis_lastname')
                            <span class="text-danger">* {{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control border border-dark" placeholder="Titulos obtenidos..." disabled title="Solo se habilitará para Docentes" name="mis_titulos" id="mis_titulos" value="{{ old('mis_titulos') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-3">
                <label for="" class="mb-1">* Fecha de la movilidad: </label>
                <input type="date" class="form-control border border-dark" name="mis_fecha" id="mis_fecha" value="{{ old('mis_fecha') }}">
                @error('mis_fecha')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-3">
                <label for="" class="mb-1">* Vigenicia de la movilidad: </label>
                <input type="date" class="form-control border border-dark" placeholder="* Vigencia..." name="mis_vigencia" id="mis_vigencia" value="{{ old('mis_vigencia') }}">
                @error('mis_vigencia')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <input type="text" class="form-control border border-dark" placeholder="Sede o regional" name="mis_sedereg" id="mis_sedereg" value="{{ old('mis_sedereg') }}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-5">
                <textarea class="form-control border border-dark" placeholder="Breve objeto..." name="mis_objeto" id="mis_objeto" onkeyup="countCharsOb(this);" maxlength="600">{{ old('mis_objeto') }}</textarea>
                <div class="d-flex justify-content-end">
                    <span id="charNumOb">0/600</span>
                </div>
            </div>
            <div class="col-5">
                <textarea class="form-control border border-dark" placeholder="Resultado" name="mis_result" id="mis_result" onkeyup="countCharsAl(this);" maxlength="600">{{ old('mis_result') }}</textarea>
                <div class="d-flex justify-content-end">
                    <span id="charNumAl">0/600</span>
                </div>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <div class="offset-1 col-2">
                <a href="{{ route('login.activites') }}" class="text-danger text-decoration-none">Regresar</a>
            </div>
            <div class="offset-5 col-3">
                <button type="submit" class="w-100 btn_1 btn-primary rounded-pill border border-dark">Registrar</button>
            </div>
        </div>
    </form>
@endsection