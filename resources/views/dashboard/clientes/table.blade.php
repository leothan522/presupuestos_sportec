<div class="table-responsive">
    <table class="table table-hover bg-light">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col">RIF </th>
            <th scope="col">Nombre o Razón Social</th>
            <th scope="col" class="text-center">Dirección</th>
            <th scope="col" class="text-center">Teléfono</th>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" style="width: 5%;">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @if(!$clientes->isEmpty())
            @foreach($clientes as $cliente)
                <th scope="row" class="text-center">{{ $cliente->id }}</th>
                <td>{{ $cliente->rif }}</td>
                <td>{{ strtoupper($cliente->nombre) }}</td>
                <td class="text-center">{{ $cliente->direccion }}</td>
                <td class="text-center">
                    @if($cliente->telefono)
                        {{ $cliente->telefono }}
                        @else
                        <span class="text-muted text-xs">NO SUMINISTRADO</span>
                    @endif
                </td>
                <td class="text-center">
                    @if($cliente->email)
                        {{ $cliente->email }}
                    @else
                        <span class="text-muted text-xs">NO SUMINISTRADO</span>
                    @endif
                </td>
                <td class="justify-content-end">
                    <div class="btn-group">
                        @if(leerJson(Auth::user()->permisos, 'clientes.create') || Auth::user()->role == 1 || Auth::user()->role == 100)
                            <button class="btn btn-info btn-sm" wire:click="edit({{ $cliente->id }})">
                                <i class="fas fa-edit"></i>
                            </button>
                        @endif
                        @if(leerJson(Auth::user()->permisos, 'clientes.destroy') || Auth::user()->role == 1 || Auth::user()->role == 100)
                            <button class="btn btn-info btn-sm" wire:click="destroy({{ $cliente->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        @endif
                </div>
                </td>
                </tr>
            @endforeach
        @else
            @if($busqueda)
                <tr class="text-center">
                    <td colspan="7">
                        <a href="{{ route('clientes.index') }}">
                            <span>
                                Sin resultados para la busqueda <strong class="text-bold"> { <span class="text-danger">{{ $busqueda }}</span> }</strong>
                            </span>
                        </a>
                    </td>
                </tr>
                @else
                <tr class="text-center">
                    <td colspan="7">
                            <span>
                                Aún no se han registrado clientes.
                            </span>
                    </td>
                </tr>
            @endif
         @endif
        </tbody>
    </table>
</div>
