@extends('layouts.inst_conv_mov')

@section('title', 'Gestor de Usuarios')

@section('content')
    <form action="" class="border border-2 rounded-3 shadow-lg mt-5 mb-5" style="width: 67%;">
        <div class="row mt-4">
            <div class="offset-9 col-2">
                <a href="{{ route('users.create') }}" class="btn btn-primary w-100"><i class="bi bi-person-plus"></i> Crear</a>
            </div>
        </div>
        {{-- @include('users.create') --}}
        <div class="row mt-2">
            <div class="offset-1 col-10">
                <div class="card">
                    <div class="card-body">
                        <table id="queryTable">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td> {{ $item->first_name }} {{ $item->second_name }} </td>
                                        <td> {{ $item->last_name }} </td>
                                        <td> {{ $item->email }} </td>
                                        <td> {{ $item->rol_codigo }} </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-8">
                                                    <a class="btn btn-primary w-100" href="{{ route('users.edit', $item->id) }}"><i class="bi bi-pencil-square"></i> Editar</a>
                                                </div>
                                                <div class="col-4">
                                                    <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="form-delete">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger w-100 d-flex justify-content-center"><i class="bi bi-trash3"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
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
                <a href="{{ route('login.activites') }}" class="btn btn-outline-success text-decoration-none w-100"><i class="bi bi-arrow-left-circle"></i> Regresar</a>
            </div>
        </div>
    </form>
@endsection