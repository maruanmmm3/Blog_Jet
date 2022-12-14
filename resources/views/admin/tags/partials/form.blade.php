<div class="form group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la Etiqueta']) !!}

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>

<div class="form group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la Etiqueta', 'readonly']) !!}

    
    @error('slug')
        <span class="text-danger">{{ $message }}</span>
    @enderror

</div>


{!! Form::label('color', 'Color:') !!}
{!! Form::select('color', $colors, null, ['class' => 'form-control']) !!} {{-- En el Controller hay una variable $colors --}}

@error('color')
    <small class="text-danger">{{$message}}</small>
@enderror

<br>