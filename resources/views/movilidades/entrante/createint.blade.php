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
            <div class="offset-1 col-3">
                <select  class="form-select border border-dark" name="mie_adminstudoc" id="mie_adminstudoc" onchange="activateDegreeMIE()">
                    <option value="" selected>-- * Tipo de persona --</option>
                    <option value="Administrativo" {{ old('mie_adminstudoc') == "Administrativo" ? 'selected': '' }}>Administrativo</option>
                    <option value="Estudiante" {{ old('mie_adminstudoc') == "Estudiante" ? 'selected': '' }}>Estudiante</option>
                    <option value="Docente" {{ old('mie_adminstudoc') == "Docente" ? 'selected': '' }}>Docente</option>
                </select>
                @error('mie_adminstudoc')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-5">
                <select class="form-select border border-dark" name="mie_instent" id="mie_instent">
                    <option value="" selected>-- * Institución o Entidad origen --</option>
                    @foreach ($instEnt as $item)
                        <option value="{{ $item->id }}" {{ old('mie_instent') == $item->id ? 'selected': '' }}>{{ $item->nombre }}</option>
                    @endforeach
                </select>
                @error('mie_instent')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-2">
                <select class="form-select border border-dark" name="mie_activo" id="mie_activo">
                    <option value="" selected>-- * Activo en la INST/ENT --</option>
                    <option value="Sí" {{ old('mie_activo') == "Sí" ? 'selected': '' }}>Sí</option>
                    <option value="No" {{ old('mie_activo') == "No" ? 'selected': '' }}>No</option>
                </select>
                @error('mie_activo')
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
                        <input type="text" class="form-control border border-dark" placeholder="* Primer nombre..." name="mie_firstname" id="mie_firstname" value="{{ old('mie_firstname') }}">
                        @error('mie_firstname')
                            <span class="text-danger">* {{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control border border-dark" placeholder="Segundo nombre..." name="mie_secondname" id="mie_secondname" value="{{ old('mie_secondname') }}">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control border border-dark" placeholder="* Apellido(s)..." name="mie_lastname" id="mie_lastname" value="{{ old('mie_lastname') }}">
                        @error('mie_lastname')
                            <span class="text-danger">* {{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control border border-dark" placeholder="Titulos obtenidos..." title="Solo se habilitará para Docentes" disabled name="mie_titulos" id="mie_titulos" value="{{ old('mie_titulos') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-3">
                <label for="" class="mb-1">* Fecha de la movilidad: </label>
                <input type="date" class="form-control border border-dark" name="mie_fecha" id="mie_fecha" value="{{ old('mie_fecha') }}">
                @error('mie_fecha')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-3">
                <label for="" class="mb-1">* Vigencia de la movilidad: </label>
                <input type="date" class="form-control border border-dark" name="mie_vigencia" id="mie_vigencia" value="{{ old('mie_vigencia') }}">
                @error('mie_vigencia')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <input type="text" class="form-control border border-dark" placeholder="Sede o regional" name="mie_sedereg" id="mie_sedereg" value="{{ old('mie_sedereg') }}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-5">
                <textarea class="form-control border border-dark" placeholder="Breve objeto..." name="mie_objeto" id="mie_objeto" onkeyup="countCharsOb(this);" maxlength="600">{{ old('mie_objeto') }}</textarea>
                <div class="d-flex justify-content-end">
                    <span id="charNumOb">0/600</span>
                </div>
            </div>
            <div class="col-5">
                <textarea class="form-control border border-dark" placeholder="Resultado" name="mie_result" id="mie_result" onkeyup="countCharsAl(this);" maxlength="600">{{ old('mie_result') }}</textarea>
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