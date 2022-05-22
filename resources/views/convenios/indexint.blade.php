@extends('layouts.inst_conv_mov')
@section('title', 'Convenios Internacionales')

@section('convInt_read_cont')
<form action="" class="border border-2 rounded-3 shadow-lg" style="width: 90%;">
    @csrf
    <div class="row mt-4 p-3 shadow-lg rounded-3 titles">
        <div class="offset-1 col-10">
            <h4 class="text-center ">Convenios Internacionales</h4>
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10">
            <div class="card">
                <div class="card-body ">
                    <table id="queryTable"> 
                        <thead>
                            <tr>
                                <th scope="col">Año de vinculación</th>
                                <th scope="col">Vigencia</th>
                                <th scope="col">Tipo</th> 
                                <th scope="col">Instituciones o Entidades Involucradas</th>
                                <th scope="col">Programa acádemico</th>
                                <th scope="col">Activo</th>
                                <th scope="col">Fecha de Inicio</th>
                                <th scope="col">Vigencia de la prorroga</th>
                                <th scope="col">Acciones</th>
                                <th scope="col">Objeto</th>
                                <th scope="col">Alcance</th>
                                <th scope="col">Identificacion (Representante legal o persona en facultad de firmar)</th>
                                <th scope="col">Nombramiento y Posesion</th>
                                <th scope="col">Constitución legal de la Institución/Entidad</th>
                                <th scope="col">Certificación de facultad para celebrar convenio</th>
                                <th scope="col">Informa de estudios previos</th>
                                <th scope="col">Minuto</th>
                                <th scope="col">Garantias</th>
                                <th scope="col">Actas y documentos suscritos en seguimiento de la ejecución del convenio</th>
                                <th scope="col">Resolución con nombramiento de supervisor</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($convInts as $item)
                                <tr>
                                    <td> {{ $item->añoVin }} </td>
                                    <td> {{ $item->vigencia }} </td>
                                    <td> {{ $item->tipo }} </td>
                                    <td> 
                                        @foreach (json_decode($item->int_ent)  as $inst)
                                            - {{$inst}}<br>
                                        @endforeach
                                    </td>
                                    <td> {{ $item->programa }} </td>
                                    <td> {{ $item->activo }} </td>
                                    <td> {{ $item->fechaInicio }} </td>
                                    <td> {{ $item->vig_pro }} </td>
                                    <td>
                                        <form action="" method="POST">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="btn btn-primary  w-100" href="">Editar</a>
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-danger w-100">Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td> <br> - {{ $item->objeto }} </td>
                                    <td> <br> - {{ $item->alcance }} </td>
                                    <td> <br> - <a href="{{ url('/download_conv_int', $item->docSupervisor) }}">{{ $item->docSupervisor }}</a></td>
                                    <td> 
                                        @foreach (json_decode($item->nombProsesion) as $nP)
                                            <br> - <a href="{{ url('/download_conv_int', $nP) }}">{{ $nP }}</a>
                                        @endforeach
                                    </td>
                                    <td> <br> - <a href="{{ url('/download_conv_int', $item->constRegistro) }}">{{ $item->constRegistro }}</a></td>
                                    <td>
                                        @foreach (json_decode($item->certFacultad) as $cert)
                                            <br> - <a href="{{ url('/download_conv_int', $cert) }}">{{ $cert }}</a>
                                        @endforeach
                                    </td>
                                    <td> <br> - <a href="{{ url('/download_conv_int', $item->infEstudios) }}">{{ $item->infEstudios }}</a></td>
                                    <td> <br> - <a href="{{ url('/download_conv_int', $item->infEstudios) }}">{{ $item->minuta }}</a></td>
                                    <td> <br> - <a href="{{ url('/download_conv_int', $item->garantias) }}">{{ $item->garantias }}</a></td>
                                    <td>
                                        @foreach (json_decode($item->actaSeguimiento ) as $acta)
                                            <br> - <a href="{{ url('/download_conv_int', $acta) }}">{{ $acta }}</a>
                                        @endforeach
                                    </td>
                                    <td> <br> - <a href="{{ url('/download_conv_int', $item->resnombSupervisor) }}">{{ $item->resnombSupervisor }}</a></td>
                                    
                                    {{-- <td> 
                                        @foreach (json_decode($item->docSoportes) as $file)
                                            <ul class="ulfiles">
                                                <li><a href="{{ url('/download_conv_nac', $file) }}">{{$file}}</a></li>
                                            </ul>
                                        @endforeach 
                                    </td> --}}
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-3">
        <div class="offset-1 col-2">
            <a  href="{{ route('login.activites') }}">Regresar</a>
        </div>
    </div>
</form>
@endsection