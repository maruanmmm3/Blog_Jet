@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Post</h1>
@stop

@section('content')

@if (session('info')) {{-- Variable info para las Alertas --}}
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif


<div class="card">
    <div class="card-body">
        {{-- Files = > true / Indicamos que vamos a enviar un archivo al formulario --}}
        {!! Form::model($post,['route' => ['admin.posts.update', $post], 'autocomplete' => 'off' , 'files' => true, 'method' => 'put']) !!} {{-- 'autocomplete' => 'off'  Es para que no se vea el autocompletado --}}

        {{-- Ya no seria necesario esta informacion ya que no 
            tiene sentido actualizar el id del usuario que crea el Post --}}
        {{-- {!! Form::hidden('user_id', auth()->user()->id) !!} --}}

            @include('admin.posts.partials.form')

            {!! Form::submit('Actualizar Post', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
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
    /* Cargar Imagen */

    document.getElementById("file").addEventListener('change', cambiarImagen);
           function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
           }
    </script>
@endsection