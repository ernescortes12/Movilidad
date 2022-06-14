@extends('layouts.inst_conv_mov')
@section('title', 'Registro Movilidad Entrante Nacional')

@section('content')
    <form action="{{ route('movilidadNacEnt.store') }}" method="POST" class="border border-2 rounded-3 shadow-lg" style="width: 70%">
        @csrf
        <div class="row mt-3 p-3 shadow-lg rounded-3 titles">
            <div class="offset-1 col-10">
                <h4 class="text-center" id="ori">Movilidad Entrante Nacional</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-3">
                <select  class="form-select border border-dark" name="mne_adminstudoc" id="mne_adminstudoc" onchange="activateDegreeMNE()">
                    <option value="" selected>-- * Tipo de persona --</option>
                    <option value="Administrativo" {{ old('mne_adminstudoc') == "Administrativo" ? 'selected': '' }}>Administrativo</option>
                    <option value="Estudiante" {{ old('mne_adminstudoc') == "Estudiante" ? 'selected': '' }}>Estudiante</option>
                    <option value="Docente" {{ old('mne_adminstudoc') == "Docente" ? 'selected': '' }}>Docente</option>
                </select>
                @error('mne_adminstudoc')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-5">
                <select class="form-select border border-dark" name="mne_instent" id="mne_instent">
                    <option value="" selected>-- * Institución o Entidad origen --</option>
                    @foreach ($instEnt as $item)
                        <option value="{{ $item->id }}" {{ old('mne_instent') == $item->id ? 'selected': '' }}>{{ $item->nombre }}</option>
                    @endforeach
                </select>
                @error('mne_instent')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-2">
                <select class="form-select border border-dark" name="mne_activo" id="mne_activo">
                    <option value="" selected>-- * Activo en la INST/ENT --</option>
                    <option value="Sí" {{ old('mne_activo') == "Sí" ? 'selected': '' }}>Sí</option>
                    <option value="No" {{ old('mne_activo') == "No" ? 'selected': '' }}>No</option>
                </select>
                @error('mne_activo')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="row">
                    <div class="offset-1 col">Información del participante (Administrativo, Estudiante o Docente):</div>
                </div>
                <div class="row mt-1">
                    <div class="offset-1 col-2">
                        <input type="text" class="form-control border border-dark" placeholder="* Primer nombre..." name="mne_firstname" id="mne_firstname" value="{{ old('mne_firstname') }}">
                        @error('mne_firstname')
                            <span class="text-danger">* {{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control border border-dark" placeholder="Segundo nombre..." name="mne_secondname" id="mne_secondname" value="{{ old('mne_secondname') }}">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control border border-dark" placeholder="* Apellido(s)..." name="mne_lastname" id="mne_lastname" value="{{ old('mne_lastname') }}">
                        @error('mne_lastname')
                            <span class="text-danger">* {{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control border border-dark" placeholder="Titulos obtenidos..." disabled title="Solo se habilitará para Docentes" name="mne_titulos" id="mne_titulos" value="{{ old('men_titulos') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-3">
                <label for="" class="mb-1">* Fecha de la movilidad: </label>
                <input type="date" class="form-control border border-dark"  name="mne_fecha" id="mne_fecha" value="{{ old('mne_fecha') }}">
                @error('mne_fecha')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-3">
                <label for="" class="mb-1">* Vigencia de la movilidad: </label>
                <input type="date" class="form-control border border-dark" placeholder="* Vigencia..."  name="mne_vigencia" id="mne_vigencia" value="{{ old('mne_vigencia') }}">
                @error('mne_vigencia')
                    <span class="text-danger">* {{$message}}</span>
                @enderror
            </div>
            <div class="col-4">
                <input type="text" class="form-control border border-dark" placeholder="Sede o regional" name="mne_sedereg" id="mne_sedereg" value="{{ old('mne_sedereg') }}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-5">
                <textarea class="form-control border border-dark" placeholder="Breve objeto..."  name="mne_objeto" id="mne_objeto" onkeyup="countCharsOb(this);" maxlength="600">{{ old('mne_objeto') }}</textarea>
                <div class="d-flex justify-content-end">
                    <span id="charNumOb">0/600</span>
                </div>
            </div>
            <div class="col-5">
                <textarea class="form-control border border-dark" placeholder="Resultado" name="mne_result" id="mne_result" onkeyup="countCharsAl(this);" maxlength="600">{{ old('mne_result') }}</textarea>
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