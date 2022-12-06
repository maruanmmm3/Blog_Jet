@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Etiqueta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {{-- Laravel Collective Si no se especifica que metodo sera automaticamente de tipo POST --}}
        {!! Form::open(['route' => 'admin.tags.store']) !!} {{-- Gracias a Laravel Collective ya se pone el @csrf --}}

           @include('admin.tags.partials.form') {{-- Ejemplo de partials --}}

            {!! Form::submit('Crear Etiqueta', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
</div>
@stop

@section('js')

    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
              setEvents: 'keyup keydown blur',
              getPut: '#slug',
              space: '-'
            });
        });
    </script>
@endsection