@extends('layouts.inst_conv_mov')
@section('title', 'Edición Convenios')

@section('content')
    <form method="POST" action="{{ route('convenios_int.update', $convs) }}" class="form-conv-int border border-2 rounded-3 shadow-lg m-5"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mt-4 p-3 shadow-lg rounded-3 titles">
            <div class="offset-1 col-10">
                <h4 class="text-center" id="die">Edición Convenio Internacional</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-2">
                <input class="form-control border border-dark" type="number" name="conv_añovinInt" id="conv_añovinInt" placeholder="* Año de Vinculación..." value="{{ $convs->añoVin }}">
                @error('conv_añovinInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
            <div class="col-3">
                <select class="form-control border border-dark"  name="conv_tipoInt" id="conv_tipoInt">
                    <option selected value="">-- * Tipo de Convenio --</option>
                    <option value="Especifico" {{ $convs->tipo == "Especifico" ? "selected": ""}}>Especifico</option>
                    <option value="Marco" {{ $convs->tipo == "Marco" ? "selected": ""}}>Marco</option>
                </select>
                @error('conv_tipoInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
            <div class="col-5 ">
                <label for="" class="mb-1">* Vigencia del convenio:</label>
                <input class="form-control border border-dark" type="date" name="con_vigenciaInt" id="con_vigenciaInt" value="{{ $convs->vigencia }}">
                @error('con_vigenciaInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-5">
                <label for="" class="mb-2">* Instituciones o entidades participantes:</label>
                <select class="form-select border-dark" multiple  name="conv_intentInt[]" id="conv_intentInt">
                        @foreach ($instEntInt as $item)
                            <option value="{{ $item->nombre }}" @foreach (explode(",", $convs->int_ent) as $conv_inst) {{ $conv_inst == $item->nombre ? 'selected':''}} @endforeach>{{$item->nombre}}</option>
                        @endforeach
                </select>
                <span sty>Nota: Usar CTRL para seleccionar varios.</span>
                <div class="row">
                    @error('conv_intentInt')
                        <span class="text-danger">*{{ $message }}</span>    
                    @enderror
                </div>
            </div>
            <div class="col-5">
                <input class="form-control border border-dark" type="text" placeholder="* Nombre del programa acádemico..." name="conv_programInt" id="conv_programInt" value="{{ $convs->programa }}">
                @error('conv_programInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <textarea class="form-control border border-dark" placeholder="Objeto..." name="conv_objetoInt" id="conv_objetoInt" onkeyup="countCharsOb(this);">{{ $convs->objeto }}</textarea>
            </div>
        </div>
        <div class="row mt-0">
            <div class="offset-1 col-10 d-flex justify-content-end">
                <span id="charNumOb" class="text-center">0/600</span>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <textarea class="form-control border border-dark" placeholder="Alcance..."  name="conv_alcanceInt" id="conv_alcanceInt" onkeyup="countCharsAl(this);">{{ $convs->alcance }}</textarea>
            </div>
        </div>
        <div class="row mt-0">
            <div class="offset-1 col-10 d-flex justify-content-end">
                <span id="charNumAl" class="text-center">0/600</span>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-2">
                <select class="form-select border border-dark" name="con_activoNoInt" id="con_activoNoInt">
                    <option selected value="">-- Activo --</option>
                    <option value="Sí" {{ $convs->activo == "Sí" ? "selected": '' }}>Sí</option>
                    <option value="No" {{ $convs->activo == "No" ? "selected": '' }}>No</option>
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
                        <label for="">Fecha:</label>
                        <input type="date" class="form-control border border-dark" id="conv_datestartInt" name="conv_datestartInt" value="{{ $convs->fechaInicio }}">
                    </div>
                    <div class="col-8">
                        <input class="form-control border border-dark" type="text" placeholder="Vigencia Prorroga..." name="con_vigproInt" id="con_vigproInt" value="{{ $convs->vig_pro }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 mb-4">
            <div class="offset-1 col-2">
                <a href="{{ route('convenios.show_int') }}" class="text-danger text-decoration-none">Regresar</a>
            </div>
            <div class="offset-5 col-3">
                <button type="submit" class="w-100 btn_1 btn-primary rounded-pill border border-dark">Actualizar</button>
            </div>
        </div>
        
    </form>
@endsection