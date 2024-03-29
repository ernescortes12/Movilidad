@extends('layouts.inst_conv_mov')
@section('title', 'Registro Convenios')

@section('content')
@if (auth()->user()->rol_id == "3" or auth()->user()->rol_id == "6")
    <form method="POST" class="form-conv-int border border-2 rounded-3 shadow-lg m-5" action="{{ route('convenios.store_int') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mt-4 p-3 shadow-lg rounded-3 titles">
            <div class="offset-1 col-10">
                <h4 class="text-center" id="die">Registro Convenio Internacional</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-2">
                <input class="form-control border border-dark" type="number" name="conv_añovinInt" id="conv_añovinInt" placeholder="* Año de Vinculación..." value="{{ old('conv_añovinInt') }}">
                @error('conv_añovinInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
            <div class="col-3">
                <select class="form-control border border-dark"  name="conv_tipoInt" id="conv_tipoInt" value="{{ old('conv_tipoInt') }}">
                    <option selected value="">-- * Tipo de Convenio --</option>
                    <option value="Especifico" {{ old('conv_tipoInt') == 'Especifico' ? 'selected': '' }}>Especifico</option>
                    <option value="Marco" {{ old('conv_tipoInt') == 'Marco' ? 'selected': '' }}>Marco</option>
                </select>
                @error('conv_tipoInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
            <div class="col-5 ">
                <label for="" class="mb-1">* Vigencia del convenio:</label>
                <input class="form-control border border-dark" type="date" name="con_vigenciaInt" id="con_vigenciaInt" value="{{ old('con_vigenciaInt') }}">
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
                            <option value="{{ $item->nombre }}" {{(collect(old('conv_intentInt'))->contains($item->nombre)) ? 'selected': '' }}>{{$item->nombre}}</option>
                        @endforeach
                </select>
                <span>Nota: Usar CTRL para seleccionar varios.</span>
                <div class="row">
                    @error('conv_intentInt')
                        <span class="text-danger">*{{ $message }}</span>    
                    @enderror
                </div>
                    
            </div>
            <div class="col-5">
                <input class="form-control border border-dark" type="text" placeholder="* Programa(s) académico(s)..." name="conv_programInt" id="conv_programInt" value="{{ old('conv_programInt') }}">
                <span>Nota: Si se ingresan 2 o más, separar con comas.</span>
                @error('conv_programInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <textarea class="form-control border border-dark" placeholder="Objeto..." name="conv_objetoInt" id="conv_objetoInt" onkeyup="countCharsOb(this);">{{ old('conv_objetoInt') }}</textarea>
            </div>
        </div>
        <div class="row mt-0">
            <div class="offset-1 col-10 d-flex justify-content-end">
                <span id="charNumOb" class="text-center">0/600</span>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <textarea class="form-control border border-dark" placeholder="Alcance..."  name="conv_alcanceInt" id="conv_alcanceInt" onkeyup="countCharsAl(this);">{{ old('conv_alcanceInt') }}</textarea>
            </div>
        </div>
        <div class="row mt-0">
            <div class="offset-1 col-10 d-flex justify-content-end">
                <span id="charNumAl" class="text-center">0/600</span>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <h6 class="text-center border rounded-3 titles pt-2 pb-2">Documentación Soporte</h6>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10 form-group">
                <label for="" class="mb-1">* Documento Identificacion (Represensante legal o persona facultada para firmar):</label>
                <input class="form-control border border-dark" type="file" id="conv_docidentInt" name="conv_docidentInt">
                @error('conv_docidentInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10 form-group">
                <label for="" class="mb-1">* Nombramiento y Posesión (Represensante legal o persona facultada para firmar):</label>
                <input class="form-control border border-dark" type="file" multiple id="conv_nomposInt[]" name="conv_nomposInt[]">
                @error('conv_nomposInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10 form-group">
                <label for="" class="mb-1">* Constitución legal o registro ante la autoridad legal competente de su país de la Universidad/Entidad:</label>
                <input class="form-control border border-dark" type="file" id="conv_constregInt" name="conv_constregInt">
                @error('conv_constregInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10 form-group">
                <label for="" class="mb-1">* Documento que certifica facultad para celebrar convenios del represensante legal y de la Universidad/Entidad:</label>
                <input class="form-control border border-dark" type="file" multiple id="conv_certfacInt[]" name="conv_certfacInt[]">
                @error('conv_certfacInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10 form-group">
                <label for="" class="mb-1">Informe de estudios previos:</label>
                <input class="form-control border border-dark" type="file" id="conv_infestudiosInt" name="conv_infestudiosInt">
                @error('conv_infestudiosInt')
                    <span class="text-danger">{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10 form-group">
                <label for="" class="mb-1">* Minuta:</label>
                <input class="form-control border border-dark" type="file" id="conv_minInt" name="conv_minInt">
                @error('conv_minInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10 form-group">
                <label for="" class="mb-1">Garantia:</label>
                <input class="form-control border border-dark" type="file" id="conv_garInt" name="conv_garInt">
                @error('conv_garInt')
                    <span class="text-danger">{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10 form-group">
                <label for="" class="mb-1">Actas y Documentos suscritos en seguimiento de la ejecución del convenio:</label>
                <input class="form-control border border-dark" type="file" multiple id="conv_actsegInt[]" name="conv_actsegInt[]">
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10 form-group">
                <label for="" class="mb-1">* Resolución con nombramiento de supervisor:</label>
                <input class="form-control border border-dark" type="file" id="conv_resInt" name="conv_resInt">
                @error('conv_resInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
        </div>
        
        <div class="row mt-4 mb-5">
            <div class="offset-1 col-2">
                <a href="{{ route('login.activites') }}" class="text-danger text-decoration-none">Regresar</a>
            </div>
            <div class="offset-5 col-3">
                <button type="submit" class="w-100 btn_1 btn-primary rounded-pill border border-dark">Registrar</button>
            </div>
        </div>
    </form>
@endif
@endsection