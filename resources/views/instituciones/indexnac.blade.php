@extends('layouts.inst_conv_mov')
@section('title', 'Instituciones Nacionales')

@section('instNac_read_cont')
<form action="" class="border border-2 rounded-3 shadow-lg" style="width: 75%;">
    @csrf
    <div class="row mt-4 p-3 shadow-lg rounded-3 titles">
        <div class="offset-1 col-10">
            <h4 class="text-center ">Instituciones Nacionales</h4>
        </div>
    </div>
    <div class="row mt-4">
        <div class="offset-1 col-10">
            <div class="card">
                <div class="card-body">
                    <table id="queryTable" class="">
                        <thead>
                            <tr> 
                                <th scope="col">Nombre</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Nit</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Email</th>
                                @if (auth()->user()->rol_id == 2)
                                    <th scope="col">Acciones</th>
                                @endif
                                <th scope="col">Documentacion Soporte</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($intNacs as $item)
                                <tr>
                                    <td> {{ $item->nombre }} </td>
                                    <td> {{ $item->ciudad }} </td>
                                    <td> {{ $item->nit }} </td>
                                    <td> {{ $item->telefono }} </td>
                                    <td> {{ $item->email }} </td>
                                    @if (auth()->user()->rol_id == 2)
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <a class="btn btn-primary w-100" href="{{ route('institucion_nac.edit', $item->id) }}">Editar</a>
                                                </div>
                                            </div>
                                            <form action="{{ route('institucion_nac.destroy', $item->id) }}" method="POST">
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
                                        @foreach (explode(',',$item->docSoportes) as $file)
                                            <ul class="ulfiles">
                                                <li><a href="{{ url('/download_ints_nac', $file) }}">{{$file}}</a></li>
                                            </ul>
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
            <a  href="{{ route('login.activites') }}" class="text-danger text-decoration-none">Regresar</a>
        </div>
    </div>
</form>
@endsection