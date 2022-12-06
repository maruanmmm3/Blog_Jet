@extends('adminlte::page')

@section('title', 'Dashboard')
{{-- Utlizaremos livewire en Admin LT :  config->adminlte  linea 546 'livewire' => true --}}
@section('content_header')
{{-- Alerta --}}
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.posts.create')}}">Crear Nuevo Post</a>

    <h1>Lista de Post Creados</h1>
@stop

@section('content')
    @livewire('admin.posts-index') 
@stop

