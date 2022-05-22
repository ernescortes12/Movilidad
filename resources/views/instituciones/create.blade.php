@extends('layouts.inst_conv_mov')
@section('title', 'Registro Instituciones')

@section('inst_create_cont')
@if (auth()->user()->rol_id =='2')
<form method="POST" action="{{ route('instituciones.store_nac') }}" class="form-inst border border-2 rounded-3 shadow-lg" enctype="multipart/form-data">
    @csrf
    
    <div class="row mt-2 p-3 shadow-lg rounded-3 titles">
        <div class="offset-1 col-10">
            <h4 class="text-center ">Registro Instituciones/Entidades ORI</h4>
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10 ">
            <input type="text" class="form-control border border-dark " placeholder="*Nombre de la institución o entidad..." id="instentnameNac" name="instentnameNac" value="{{ old('instentnameNac') }}">
            @error('instentnameNac')
                <span style="color: red">*{{ $message }}</span>    
            @enderror
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10 ">
            <input type="text" class="form-control border border-dark" placeholder="Departamento, Ciudad o Municipio..." id="dtpcitymunNac" name="dtpcitymunNac" value="{{ old('dtpcitymunNac') }}">
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10 ">
            <input type="text" class="form-control border border-dark" placeholder="Número NIT..." id="nitNac" name="nitNac" value="{{ old('nitNac') }}">
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10 ">
            <input type="number" class="form-control border border-dark" placeholder="Telefono..." id="telefonoNac" name="telefonoNac" value="{{ old('telefonoNac') }}">
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10 ">
            <input type="email" class="form-control border border-dark" placeholder="*Email..." id="emailNac" name="emailNac" value="{{ old('emailNac') }}">
            @error('emailNac')
                <span style="color: red">*{{ $message }}</span>    
            @enderror
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10 ">
            <label for="">Documentación Soporte: </label>
            <input type="file" class="form-control border border-dark " multiple name="inst_docsoporteNac[]" id="inst_docsoporteNac[]" value="{{ old('emailNac') }}">
            @error('inst_docsoporteNac')
                <span style="color: red">{{ $message }}</span>    
            @enderror
        </div>
    </div>
    <div class="row mt-4 mb-5">
        <div class="offset-1 col-2">
            <a href="{{ route('login.activites') }}">Regresar</a>
        </div>            
        <div class="offset-2 col-3">
            <button class="w-100 btn_2 btn-danger rounded-pill border border-dark">Cancelar</button>
        </div>
        <div class="col-3">
            <button type="submit" class="w-100 btn_1 btn-primary rounded-pill border border-dark">Registrar</button>
        </div>
    </div>
</form>   
@elseif (auth()->user()->rol_id =='3')
<form action="{{ route('instituciones.store_int') }}" method="POST" class="form-inst border border-2 rounded-3 shadow-lg ">
    @csrf
    <div class="row mt-2 p-3 shadow-lg rounded-3 titles">
        <div class="offset-1 col-10">
            <h4 class="text-center">Registro Institucion/Entidad DIE</h4>
        </div>
    </div>

    <div class="row mt-4">
        <div class="offset-1 col-10">
            <input type="text" class="form-control border border-dark " placeholder="*Nombre de la institución o entidad..." id="instentnameInt" name="instentnameInt" value="{{ old('instentnameNac') }}">
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10">
            <input type="text" class="form-control border border-dark " placeholder="*País..." id="inst_paisInt" name="inst_paisInt" value="{{ old('instentnameNac') }}">
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10">
            <input type="text" class="form-control border border-dark " placeholder="*Ciudad, estado o provincia..." id="ints_cityInt" name="ints_cityInt" value="{{ old('instentnameNac') }}">
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10">
            <input type="text" class="form-control border border-dark " placeholder="Telefono..." id="ints_telefonoInt" name="ints_telefonoInt" value="{{ old('instentnameNac') }}">
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10">
            <input type="email" class="form-control border border-dark " placeholder="*Email..." id="int_emailInt" name="int_emailInt" value="{{ old('instentnameNac') }}">
        </div>
    </div>
    <div class="row mt-4 mb-4">
        <div class="offset-1 col-2">
            <a href="{{ route('login.activites') }}">Regresar</a>
        </div>            
        <div class="offset-2 col-3">
            <button class="w-100 btn_2 btn-danger rounded-pill border border-dark">Cancelar</button>
        </div>
        <div class="col-3">
            <button type="submit" class="w-100 btn_1 btn-primary rounded-pill border border-dark">Registrar</button>
        </div>
    </div>
</form>
@endif
         
@endsection
