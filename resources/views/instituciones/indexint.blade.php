@extends('layouts.inst_conv_mov')
@section('title', 'Instituciones Internacionales')

@section('content')
    <form action="" class="border border-2 rounded-3 shadow-lg mt-5 mb-5" style="width: 78%">
        @csrf
        <div class="row mt-4 p-3 shadow-lg rounded-3 titles">
            <div class="offset-1 col-10">
                <h4 class="text-center ">Instituciones Internacionales</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-1 col-10">
                <div class="card">
                    <div class="card-body">
                        <table id="queryTable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">País</th>
                                    <th scope="col">Ciudad</th>
                                    <th scope="col">NIT o equivalente</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Email</th>
                                    @if (auth()->user()->rol_id == 3)
                                        <th scope="col">Acciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instInts as $item)
                                    <tr>
                                        <td class="text-center"> {{ $item->id }} </td>
                                        <td> {{ $item->nombre }} </td>
                                        <td> {{ $item->pais }} </td>
                                        <td> {{ $item->ciudad }} </td>
                                        <td> {{ $item->nit }} </td>
                                        <td> {{ $item->telefono }} </td>
                                        <td> {{ $item->email }} </td>
                                        @if (auth()->user()->rol_id == 3)
                                            <td>
                                                <div class="row">
                                                    <div class="col">
                                                        <a class="btn btn-primary w-100" href="{{ route('institucion_int.edit', $item->id) }}">Editar</a>
                                                    </div>
                                                </div>
                                                <form action="{{ route('institucion_int.destroy', $item->id) }}" method="POST" class="form-delete">
                                                    @csrf    
                                                    <div class="row mt-1">
                                                        <div class="col">
                                                            <button type="submit" class="btn btn-outline-danger w-100">Delete</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-4">
            <div class="offset-1 col-2">
                <a href="{{ route('login.activites') }}" class="btn btn-outline-success text-decoration-none">Regresar</a>
            </div>
        </div>
    </form>
@endsection