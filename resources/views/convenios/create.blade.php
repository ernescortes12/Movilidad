@extends('layouts.convenios')
@section('title', 'Registro Convenios')

@section('conv_cont')
@if (auth()->user()->rol_id == "2")
    <form method="POST" class="form-conv-nac border border-2 rounded-3 shadow-lg">
        <img src="{{asset('images/index/header_login.jpg')}}" class="w-100" alt="" class="img-fluid m-0 rounded-top">
        <div class="row mt-2">
            <div class="offset-1 col-5">
                <a  href="{{ route('login.activites') }}">Regresar</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="offset-1 col-10">
                <h4 class="text-center">Registro Convenios ORI</h4>
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
                        <input type="date" class="form-control border border-dark" id="fechaInicio" name="fechaInicio">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-4">
                <input type="text" class="form-control border border-dark" placeholder="Supervisor..." id="superInput" name="superInput">
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-4">
                <select class="form-control border border-dark" id="inputInstEnt">
                    <option value="">-- Institución o Entidad --</option>
                    {{-- Las demas opciones se traen de la base de datos --}}
                </select>
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-4">
                <input type="text" class="form-control border border-dark" placeholder="Departamento, Ciudad o Municipio..." id="dtp-city-mun" name="dtp-city-mun">
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-4">
                <input type="text" class="form-control border border-dark" placeholder="Número NIT..." id="nit_nac" name="nit_nac">
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-4">
                <textarea name="recursos" id="recursos" placeholder="Recursos..." class="form-control border border-dark"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-4">
                <input type="text" class="form-control border border-dark" placeholder="Vigencia..." id="vigencia_nac" name="vigencia_nac">
            </div>
        </div>
        <div class="row mt-4 mb-5">
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
        {{-- <img src="{{asset('images/index/header_login.jpg')}}" alt="" class="img-fluid m-0 rounded-top"> --}}
        <div class="row mt-2">
            <div class="offset-1 col-5">
                <a href="{{ route('login.activites') }}">Regresar</a>
            </div>
        </div>
        <div class="row mt-4 p-3">
            <div class="offset-1 col-10">
                <h4 class="text-center">Registro Convenios DIE</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-2">
                <input class="form-control border border-dark" type="number" name="añoVin" id="añoVin" placeholder="Año de Vinculación...">
            </div>
            <div class="col-3">
                <select name="tipoConv" id="tipoConv" class="form-select border border-dark">
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
                <input class="form-select border border-dark" type="text" name="vigencia" id="vigencia" placeholder="Vigencia...">
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-5">
                <input class="form-select border border-dark" type="text" name="inst_ent" id="inst_ent" placeholder="Instituciones o Entidades participantes...">
            </div>
            <div class="col-5">
                <input class="form-select border border-dark" type="text" name="nombreProg" id="nombreProg" placeholder="Nombre del programa academico">
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <textarea class="form-select border border-dark" name="objeto" id="objeto" placeholder="Objeto..."></textarea>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <textarea class="form-select border border-dark" name="alcance" id="alcance" placeholder="Alcance..."></textarea>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-2">
                <select class="form-select border border-dark" name="activoNo" id="activoNo">
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
                        <input type="date" class="form-control border border-dark" id="fechainicioInt" name="fechainicioInt">
                    </div>
                    <div class="col-8">
                        <input class="form-select border border-dark" type="text" name="vigPro" id="vigPro" placeholder="Vigencia Prorroga...">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 mb-5">
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