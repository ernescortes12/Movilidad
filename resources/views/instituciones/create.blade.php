@extends('layouts.instituciones')
@section('title', 'Registro Instituciones')

@section('inst_cont')
    <form method="POST" class="form-inst border border-2 rounded-3 shadow-lg ">
        @csrf
        <img src="{{asset('images/index/header_login.jpg')}}" alt="" class="img-fluid m-0 rounded-top">
        <div class="row mt-2">
            <div class="offset-1 col-5 ">
                <a href="{{ route('login.activites') }}">Regresar</a>
            </div>
        </div>
        <div class="row mt-2">
            <div class="offset-1 col-10">
                <h4 class="text-center">Registro Instituciones/Entidades DIE</h4>
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-4">
                <input type="text" class="form-control border border-dark" placeholder="Nombre de la institución o entidad..." id="inst_ent_name" name="inst_ent_name">
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
                <input type="number" class="form-control border border-dark" placeholder="Telefono..." id="telefono_nac" name="telefono_nac">
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 mt-4">
                <input type="email" class="form-control border border-dark" placeholder="Email..." id="email_nac" name="email_nac">
            </div>
        </div>
        <div class="row mt-4 mb-5">
            <div class="offset-1 col-5">
                <button type="submit" class="w-100 btn_2 btn-danger rounded-pill border border-dark">Cancelar</button>
            </div>
            <div class="col-5">
                <button type="submit" class="w-100 btn_1 btn-primary rounded-pill border border-dark">Registrar</button>
            </div>
        </div>
        

    </form>
@endsection
