<div class="card">
        {{-- Buscador --}}
    <div class="card-header">
        {{-- wire_model  mira el contenido de la variable search --}}
        <input wire:model="search" class="form-control" placeholder="Ingrese Post a Buscar"> 
    </div>

    @if ($posts->count())
        {{-- Tabla --}}
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Status</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        @if ($post->status == 1)
                            <td>Borrador</td> 
                        @else
                            <td>Publicado</td> 
                        @endif
                        
                        <td with="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit', $post)}}">Editar</a>
                        </td>
                        <td with="10px">
                            <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Paginacion --}}
    <div class="card-footer">
        {{$posts->links()}}
    </div>

    {{-- En el caso de no encontrar Datos @if --}}
    @else
    <div class="card body">
        <strong>No hay Datos Encontrados...</strong>
    </div> 
    @endif

</div>
