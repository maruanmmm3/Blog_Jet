<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del Post'] ) !!}

    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del Post', 'readonly'] ) !!}

    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
{{-- Select de Categoria --}}
<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control'] ) !!}
    
    @error('category_id')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
{{-- Etiqueta --}}

<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach ($tags as $tag)  {{-- Recordemos que llamamos a los datos de Tag --}}
        <label class="mr-2">
            {{-- Todo lo que seleccionemos sera almacenado el tags[] --}}
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{$tag->name}}
        </label>
    @endforeach

    @error('tags')
        <br>
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>

    <label>
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>

    <label>
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>

    @error('status')
        <br>
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

{{-- Para la Imagen --}}

<div class="row">
    <div class="col">
        <div class="image-wrapper">
            @isset ($post->image) {{-- isset / Ve si esta definido se mostrara tal resultado si no tal resultado --}}
                <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2022/10/05/05/40/sunset-7499759_960_720.jpg" alt="">
            @endisset
           
        </div>
        
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se muestra en post') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!} {{-- accept Es para que solo vea imagenes en la seleccion --}}
            @error('file')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        
        Esta imagen es la que se mostrara en el post
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto:') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

    @error('extract')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del Post:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

    @error('body')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>