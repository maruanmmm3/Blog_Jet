@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@if (session('info'))
<div class="alert alert-success">
    <strong>{{ session('info') }}</strong>
</div>
@endif
    @can('admin.tags.create')
        <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.tags.create')}}">Crear Nueva Etiqueta</a>
    @endcan
    
    <h1>Lista de Etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td width="10px">

                                @can('admin.tags.edit')
                                    <a class="btn btn-primary" href="{{route('admin.tags.edit', $tag)}}">Editar</a>
                                @endcan
                                
                            </td>
                            <td width="10px">

                                @can('admin.tags.destroy')
                                    <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                @endcan

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
@stop
