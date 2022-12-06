@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Asignar un Rol</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alet alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif


    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control">{{$user->name}}</p>

            
            <h2 class="h5">Listado de Roles</h2>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}{{-- Enviaremos roles en checkbox (id) --}}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {{-- Traemos los Roles en un checkbox --}}
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach

                {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop