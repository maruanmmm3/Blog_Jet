<div>
    <div class="card">

        {{-- Podriasmo crear otro busqueda para el tema de buscar por usuarios --}}
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese la solicitud a buscar">
        </div>

     @if($solicituds->count()) 
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Tipo de solicitud</th>
                        <th>Descripcion</th>
                        
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($solicituds as $solicitud)
                        <tr>
                            <td>{{$solicitud->id}}</td>
                            <td>{{$solicitud->user->name}}</td>
                            @if ($solicitud->status == 1)
                            <td>Cambio de rol</td>
                            @else
                            <td>Fallo en el sistema</td> 
                            @endif
                            
                            <td>{{$solicitud->descripcion}}</td>
                            <td width="10px">
                                {{-- Marcar con un boton si esta atendido nada mas --}}
                               {{--  <a class="btn btn-primary" href="{{route('admin.users.edit', $user)}}">Editar</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        

        {{-- <div class="card-footer">
            {{$solicituds->links()}}
        </div> --}}
    @else 
        
    <div class="card">
        <strong>No hay ningun registro</strong>
    </div>

     @endif 

    </div>
</div>
