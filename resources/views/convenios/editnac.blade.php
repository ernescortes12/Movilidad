@extends('layouts.inst_conv_mov')
@section('title', 'Edición Convenios')

@section('content')
<form method="POST" action="{{ route('convenios_nac.update', $convs) }}" class="form-conv-nac border border-2 rounded-3 shadow-lg mt-5 mb-5"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mt-3 p-3 shadow-lg rounded-3 titles">
        <div class="offset-1 col-10">
            <h4 class="text-center" id="ori">Edición Convenio Nacional</h4>
        </div>
    </div>
    <div class="row">
        <div class="offset-1 col-10 mt-3">
            <div class="row">
                <div class="col">
                    <label for="">* Fecha de inicio: </label>
                </div>
            </div>
            <div class="row">
                <div class="col mt-1">
                    <input type="date" class="form-control border border-dark" id="conv_fechaInicioNac" name="conv_fechaInicioNac" value="{{ $convs->fechaInicio }}">
                    @error('conv_fechaInicioNac')
                        <span class="text-danger">*{{ $message }}</span>    
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10">
            <select class="form-select border-dark" name="conv_tipoNac" id="conv_tipoNac">
                <option value="" selected>-- * Tipo de convenio --</option>
                <option value="Especifico" {{ $convs->tipo == 'Especifico' ? 'selected': ''}}>Especifico</option>
                <option value="Marco" {{ $convs->tipo == 'Marco' ? 'selected': ''}}>Marco</option>
            </select>
            @error('conv_tipoNac')
                <span class="text-danger">*{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10">
            <input type="text" class="form-control border border-dark" placeholder="* Supervisor..." id="conv_superNac" name="conv_superNac" value="{{ $convs->supervisor }}">
            @error('conv_superNac')
                <span class="text-danger">*{{ $message }}</span>    
            @enderror
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10">
            <select class="form-control border border-dark" id="con_instEntNac" name="con_instEntNac">
                <option selected value="">-- * Institución o Entidad --</option>
                @foreach ($instEntNacs as $item)
                    <option value="{{ $item->id }}" {{ $convs->instEntNac_id == $item->id ? 'selected' : '' }}> {{ $item->nombre }}</option>
                @endforeach
            </select>
            @error('con_instEntNac')
                <span class="text-danger">*{{ $message }}</span>    
            @enderror
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10">
            <textarea placeholder="Recursos..." class="form-control border border-dark"  name="conv_recursosNac" id="conv_recursosNac"  onkeyup="countCharsOb(this);" maxlength="600">{{ $convs->recursos }}</textarea>
            <div class="row mt-0">
                <div class="d-flex justify-content-end">
                    <span id="charNumOb" class="text-center">0/600</span>
                </div>
            </div> 
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10">
            <label for="">* Vigencia del convenio:</label>
            <input type="date" class="form-control border border-dark" id="conv_vigenciaNac" name="conv_vigenciaNac" value="{{ $convs->vigencia }}">
            @error('conv_vigenciaNac')
                <span class="text-danger">*{{ $message }}</span>    
            @enderror
        </div>
    </div>
    <div class="row mt-4 mb-5">
            <div class="offset-1 col-2">
                <a  href="{{ route('convenios.show_nac') }}" class="text-danger text-decoration-none">Regresar</a>
            </div>
        <div class="offset-5 col-3">
            <button type="submit" class="w-100 btn_1 btn-primary rounded-pill border border-dark">Registrar</button>
        </div>
    </div>
</form>
@endsection