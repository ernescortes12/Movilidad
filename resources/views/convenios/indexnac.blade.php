@extends('layouts.inst_conv_mov')
@section('title', 'Convenios Nacionales')

@section('content')
<form action="" class="border border-2 rounded-3 shadow-lg mt-5 mb-5" style="width: 75%;">
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
                                <th scope="col">Ciudad</th>
                                <th scope="col">Fecha de Inicio</th>
                                <th scope="col">Vigencia</th> 
                                <th scope="col">Tipo</th>
                                @if (auth()->user()->rol_id == 2)
                                    <th scope="col">Acciones</th>
                                @endif
                                <th scope="col">Recursos</th>
                                <th scope="col">Documentación Soporte</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($convNacs as $item)
                                <tr>
                                    <td> {{ $item->codigo }}</td>
                                    <td> {{ $item->supervisor }} </td>
                                    <td> {{ $item->nombre }} </td>
                                    <td> {{ $item->ciudad }} </td>
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
                                            <form action="{{ route('convenio_nac.destroy', $item->id) }}" method="POST" class="form-delete">
                                                @csrf
                                                <div class="row mt-1">
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-outline-danger w-100">Delete</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    @endif
                                    <td> {{ $item->recursos }} </td>                               
                                    <td> 
                                        @foreach (explode(",", $item->docSoportes) as $file)
                                            <br> - <a href="{{ url('/download_conv_nac', $file) }}">{{$file}}</a>
                                        @endforeach 
                                    </td>
                                    
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
            <a href="{{ route('login.activites') }}" class="btn btn-outline-success text-decoration-none">Regresar</a>
        </div>
    </div>
</form>
@endsection