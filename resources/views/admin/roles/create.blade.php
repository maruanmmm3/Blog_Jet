@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear nuevo Rol</h1>
@stop

@section('content')
    {{-- El ROl normal un crud normal --}}
    <div class="card">
        <div class="card-body">

        {!! Form::open(['route' => 'admin.roles.store']) !!}

            @include('admin.roles.partials.form')

            {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}
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