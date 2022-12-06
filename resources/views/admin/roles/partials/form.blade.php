<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol']) !!}

    @error('name')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>

{{-- Mostramos el listado de Permissions --}}

<h2 class="h3">Lista de permisos</h2>
{{-- De esta manera saldra los permisos pero seran confusos para el usuario
    Asi que agregaremos un campo 'Descripcion' en la tabla de permissions --}} {{-- ALT - Click => Multi Click --}}
@foreach ($permissions as $permission)
    <div>
        <label for="">
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
            {{$permission->descripcion}}
        </label>
    </div>
@endforeach