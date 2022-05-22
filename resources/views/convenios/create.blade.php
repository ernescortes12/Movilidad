@extends('layouts.inst_conv_mov')
@section('title', 'Registro Convenios')

@section('conv_create_cont')
@if (auth()->user()->rol_id == "2")
    <form method="POST" class="form-conv-nac border border-2 rounded-3 shadow-lg mt-5 mb-5" action="{{ route('convenios.store_nac') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3 p-3 shadow-lg rounded-3 titles">
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
                        <input type="date" class="form-control border border-dark" id="conv_fechaInicioNac" name="conv_fechaInicioNac" value="{{ old('conv_fechaInicioNac') }}">
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
                    <option value="" selected>-- Tipo de convenio --</option>
                    <option value="Especifico">Especifico</option>
                    <option value="Marco">Marco</option>
                </select>
                @error('conv_tipoNac')
                    <span class="text-danger">*{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <input type="text" class="form-control border border-dark" placeholder="Supervisor..." id="conv_superNac" name="conv_superNac" value="{{ old('conv_superNac') }}">
                @error('conv_superNac')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <select class="form-control border border-dark" id="con_instEntNac" name="con_instEntNac">
                    <option selected value="">-- Institución o Entidad --</option>
                    @foreach ($instEntNacs as $item)
                        <option value="{{ $item->nombre }}"> {{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <input type="text" class="form-control border border-dark" placeholder="Departamento, Ciudad o Municipio..." id="conv_dtpcitymunNac" name="conv_dtpcitymunNac" value="{{ old('conv_dtpcitymunNac') }}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <input type="text" class="form-control border border-dark" placeholder="Número NIT..." id="conv_nitNac" name="conv_nitNac" value="{{ old('conv_nitNac') }}">
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <textarea placeholder="Recursos..." class="form-control border border-dark"  name="conv_recursosNac" id="conv_recursosNac" value="{{ old('conv_recursosNac') }}"></textarea>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <input type="text" class="form-control border border-dark" placeholder="Vigencia..." id="conv_vigenciaNac" name="conv_vigenciaNac" value="{{ old('conv_vigenciaNac') }}">
                @error('conv_vigenciaNac')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="offset-1 col-10">
                <label for="">Documentación Soporte: </label>
                <input type="file" class="form-control border border-dark " multiple name="conv_docsoporteNac[]" id="conv_docsoporteNac[]" >
                {{-- @error('conv_docsoporteNac')
                    <span class="text-danger">{{ $message }}</span>    
                @enderror --}}
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
    <form method="POST" class="form-conv-int border border-2 rounded-3 shadow-lg m-5" action="{{ route('convenios.store_int') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mt-4 p-3 shadow-lg rounded-3 titles">
            <div class="offset-1 col-10">
                <h4 class="text-center" id="die">Registro Convenios DIE</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-2">
                <input class="form-control border border-dark" type="number" name="conv_añovinInt" id="conv_añovinInt" placeholder="*Año de Vinculación..." value="{{ old('conv_añovinInt') }}">
                @error('conv_añovinInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
            <div class="col-3">
                <select class="form-control border border-dark"  name="conv_tipoInt" id="conv_tipoInt" value="{{ old('conv_tipoInt') }}">
                    <option selected value="">-- Tipo de Convenio --</option>
                    <option value="Especifico">Especifico</option>
                    <option value="Marco">Marco</option>
                </select>
                @error('conv_tipoInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
            <div class="col-5 ">
                <input class="form-control border border-dark" type="text" placeholder="Vigencia..."  name="con_vigenciaInt" id="con_vigenciaInt" value="{{ old('con_vigenciaInt') }}">
                @error('con_vigenciaInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-5">
                <label for="" class="mb-2">Instituciones o entidades participantes:</label>
                <select class="form-select border-dark" multiple  name="conv_intentInt[]" id="conv_intentInt">
                        @foreach ($instEntInt as $item)
                            <option value="{{ $item->nombre }}">{{$item->nombre}}</option>
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
                <input class="form-control border border-dark" type="text" placeholder="Nombre del programa academico..." name="conv_programInt" id="conv_programInt" value="{{ old('conv_programInt') }}">
                @error('conv_programInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <textarea class="form-control border border-dark" placeholder="Objeto..." name="conv_objetoInt" id="conv_objetoInt" value="{{ old('conv_objetoInt') }}"></textarea>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <textarea class="form-control border border-dark" placeholder="Alcance..."  name="conv_alcanceInt" id="conv_alcanceInt" value="{{ old('conv_alcanceInt') }}"></textarea>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-2">
                <select class="form-select border border-dark" name="con_activoNoInt" id="con_activoNoInt">
                    <option selected value="">-- Activo --</option>
                    <option value="Sí">Sí</option>
                    <option value="No">No</option>
                </select>
                @error('con_activoNoInt')
                    <span class="text-danger">*{{ $message }}</span>    
                @enderror
            </div>
            <div class="col-8">
                <div class="row ">
                    <div class="col mt-1">
                        <label for="fechas">Prorrogas o Renovaciones: </label>
                    </div>
                </div>
                <div class="row mt-2 mb-1">
                    <div class="col-4">
                        <input type="date" class="form-control border border-dark" id="conv_datestartInt" name="conv_datestartInt" value="{{ old('conv_datestartInt') }}">
                        @error('conv_datestartInt')
                            <span class="text-danger">*{{ $message }}</span>    
                        @enderror
                    </div>
                    <div class="col-8">
                        <input class="form-control border border-dark" type="text" placeholder="Vigencia Prorroga..." name="con_vigproInt" id="con_vigproInt" value="{{ old('con_vigproInt') }}">
                        @error('con_vigproInt')
                            <span class="text-danger">*{{ $message }}</span>    
                        @enderror
                    </div>
                </div>
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