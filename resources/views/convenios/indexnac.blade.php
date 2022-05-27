@extends('layouts.inst_conv_mov')
@section('title', 'Convenios Nacionales')

@section('convNac_read_cont')
<form action="" class="border border-2 rounded-3 shadow-lg" style="width: 75%;">
    @csrf
    <div class="row mt-4 p-3 shadow-lg rounded-3 titles">
        <div class="offset-1 col-10">
            <h4 class="text-center ">Convenios Nacionales</h4>
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10">
            <div class="card">
                <div class="card-body ">
                    <table id="queryTable"> 
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Supervisor</th>
                                <th scope="col">Institución o Entidad</th>
                                <th scope="col">Dpto/Cd/Mpio</th>
                                <th scope="col">Fecha de Inicio</th>
                                <th scope="col">Vigencia</th> 
                                <th scope="col">Tipo</th>
                                
                                @if (auth()->user()->rol_id == 2)
                                    <th scope="col">Acciones</th>
                                @endif
                                <th scope="col">Documentación Soporte</th>
                                <th scope="col">Nit</th>
                                <th scope="col">Recursos</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($convNacs as $item)
                                <tr>
                                    <td> {{ $item->codigo }}</td>
                                    <td> {{ $item->supervisor }} </td>
                                    <td> {{ $item->instEntNac }} </td>
                                    <td> {{ $item->dtpcitymun }} </td>
                                    <td> {{ $item->fechaInicio }} </td>
                                    <td> {{ $item->vigencia }} </td>
                                    <td> {{ $item->tipo }} </td>
                                    @if (auth()->user()->rol_id == 2)
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <a class="btn btn-primary  w-100" href="{{ route('convenios_nac.edit', $item->id) }}">Editar</a>
                                                </div>
                                            </div>
                                            <form action="{{ route('convenio_nac.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                <div class="row mt-1">
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-danger w-100">Delete</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    @endif                                    
                                    <td> 
                                        @foreach (explode(",", $item->docSoportes) as $file)
                                            <br> - <a href="{{ url('/download_conv_nac', $file) }}">{{$file}}</a>
                                        @endforeach 
                                    </td>
                                    <td> {{ $item->nit }} </td>
                                    <td> {{ $item->recursos }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-4">
        <div class="offset-1 col-2">
            <a  href="{{ route('login.activites') }}" class="text-danger text-decoration-none">Regresar</a>
        </div>
    </div>
</form>
@endsection