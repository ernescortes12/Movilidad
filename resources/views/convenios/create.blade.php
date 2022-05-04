@extends('layouts.convenios')
@section('title', 'Registro Convenios')

@section('conv_cont')
@if (auth()->user()->rol_id == "2")
    <form method="POST" class="form-conv-nac border border-2 rounded-3 shadow-lg">
        @csrf
        <img src="{{asset('images/index/header_login.jpg')}}" class="w-100" alt="" class="img-fluid m-0 rounded-top">
        <div class="row mt-3">
            <div class="offset-1 col-10">
                <h4 class="text-center" id="ori">Registro Convenios ORI</h4>
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-3">
                <div class="row">
                    <div class="col">
                        <label for="">Fecha de inicio: </label>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col mt-1">
                        <input type="date" class="form-control border border-dark" id="conv_fechaInicioNac" name="conv_fechaInicioNac">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-4">
                <input type="text" class="form-control border border-dark" placeholder="Supervisor..." id="conv_superNac" name="conv_superNac">
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-4">
                <select class="form-control border border-dark" id="instEntNac">
                    <option selected value="">-- Institución o Entidad --</option>
                    @foreach ($instEntNacs as $item)
                        <option value="{{ $item -> id }}"> {{ $item -> nombre }}</option>
                    @endforeach
                    {{-- Las demas opciones se traen de la base de datos --}}
                </select>
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-4">
                <input type="text" class="form-control border border-dark" placeholder="Departamento, Ciudad o Municipio..." id="conv_dtpcitymunNac" name="conv_dtpcitymunNac">
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-4">
                <input type="text" class="form-control border border-dark" placeholder="Número NIT..." id="conv_nitNac" name="conv_nitNac">
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-4">
                <textarea placeholder="Recursos..." class="form-control border border-dark"  name="conv_recursosNac" id="conv_recursosNac"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-4">
                <input type="text" class="form-control border border-dark" placeholder="Vigencia..." id="conv_vigenciaNac" name="conv_vigenciaNac">
            </div>
        </div>
        <div class="row mt-4 mb-5">
                <div class="offset-1 col-2">
                    <a  href="{{ route('login.activites') }}">Regresar</a>
                </div>
            <div class="offset-2 col-3">
                <button type="submit" class="w-100 btn_2 btn-danger rounded-pill border border-dark">Cancelar</button>
            </div>
            <div class="col-3">
                <button type="submit" class="w-100 btn_1 btn-primary rounded-pill border border-dark">Registrar</button>
            </div>
        </div>
        
    </form>
@elseif (auth()->user()->rol_id == "3")

    <form method="POST" class="form-conv-int border border-2 rounded-3 shadow-lg">
        @csrf
        {{-- <img src="{{asset('images/index/header_login.jpg')}}" alt="" class="img-fluid m-0 rounded-top"> --}}
        <div class="row mt-4 p-3 shadow-lg rounded-3" style="background: #A1CB21; color: white">
            <div class="offset-1 col-10">
                <h4 class="text-center" id="die">Registro Convenios DIE</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-2">
                <input class="form-control border border-dark" type="number" name="conv_añovinInt" id="conv_añovinInt" placeholder="Año de Vinculación...">
            </div>
            <div class="col-3">
                <select class="form-select border border-dark"  name="conv_tipoInt" id="conv_tipoInt" >
                    <option selected value="">-- Tipo de Convenio --</option>
                    <option value="1">Acuerdo de colaboración</option>
                    <option value="2">Acuerdo de Cooperación Internacional No.2021- 682</option>
                    <option value="3">Acuerdo especifico</option>
                    <option value="4">Acuerdo marco de cooperación académic</option>
                    <option value="5">Convenio de Colaboaracón</option>>
                    <option value="6">Convenio de cooperación educativa</option>
                    <option value="7">Convenio de cooperación interisntitucional</option>
                    <option value="8">Convenio especifico</option>
                    <option value="9">Convenio específico de aplicación programa de intercambio de estudiantes No.2021- 6824</option>
                    <option value="10">Convenio general de colaboración</option>
                    <option value="11">Convenio Marco</option>
                    <option value="12">Convenio marco de colaboración</option>
                    <option value="13">Memorando de entendimiento</option>
                </select>
            </div>
            <div class="col-5 ">
                <input class="form-select border border-dark" type="text" placeholder="Vigencia..."  name="con_vigenciaInt" id="con_vigenciaInt" >
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-5">
                <input class="form-select border border-dark" type="text" placeholder="Instituciones o Entidades participantes..."  name="conv_intentInt" id="conv_intentInt" >
            </div>
            <div class="col-5">
                <input class="form-select border border-dark" type="text" placeholder="Nombre del programa academico..." name="conv_programInt" id="conv_programInt">
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <textarea class="form-select border border-dark" placeholder="Objeto..." name="conv_objetoInt" id="conv_objetoInt"></textarea>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <textarea class="form-select border border-dark" placeholder="Alcance..."  name="conv_alcanceInt" id="conv_alcanceInt"></textarea>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-2">
                <select class="form-select border border-dark" name="con_activoNoInt" id="con_activoNoInt">
                    <option selected value="">Activo</option>
                    <option value="1">Sí</option>
                    <option value="2">No</option>
                </select>
            </div>
            <div class="col-8">
                <div class="row ">
                    <div class="col mt-1">
                        <label for="fechas">Prorrogas o Renovaciones: </label>
                    </div>
                </div>
                <div class="row mt-2 mb-1">
                    <div class="col-4">
                        <input type="date" class="form-control border border-dark" id="conv_datestartInt" name="conv_datestartInt">
                    </div>
                    <div class="col-8">
                        <input class="form-select border border-dark" type="text" placeholder="Vigencia Prorroga..." name="con_vigproInt" id="con_vigproInt" >
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 mb-5">
            <div class="offset-1 col-2">
                <a href="{{ route('login.activites') }}">Regresar</a>
            </div>
            <div class="offset-2 col-3">
                <button type="submit" class="w-100 btn_2 btn-danger rounded-pill border border-dark">Cancelar</button>
            </div>
            <div class="col-3">
                <button type="submit" class="w-100 btn_1 btn-primary rounded-pill border border-dark">Registrar</button>
            </div>
        </div>
        
    </form>
    
@endif
@endsection