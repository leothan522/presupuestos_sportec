<div class="row justify-content-center">
    @if(leerJson(Auth::user()->permisos, 'clientes.create') || Auth::user()->role == 1 || Auth::user()->role == 100)
        <div class="col-md-4">

        <div class="card card-gray-dark" style="height: inherit; width: inherit; transition: all 0.15s ease 0s;">
            <div class="card-header">
                <h3 class="card-title">
                    @if($view == 'create') Nuevo Cliente @else Editar Cliente @endif
                </h3>
                <div class="card-tools">
                    @if($view == 'edit')
                        <button type="button" class="btn btn-tool" wire:click="limpiar">
                            <i class="fas fa-user-plus"></i></span>
                        </button>
                    @endif

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @include('dashboard.clientes.form')

            </div>
            <!-- /.card-body -->
            <div class="overlay-wrapper" wire:loading>
                <div class="overlay">
                    <i class="fas fa-2x fa-sync-alt"></i>
                </div>
            </div>
        </div>

    </div>
    @endif

    <div class="col-md-8">

        <div class="card card-outline card-primary" style="height: inherit; width: inherit; transition: all 0.15s ease 0s;">
            <div class="card-header">
                <h3 class="card-title">Clientes Registrados</h3>
                <div class="card-tools">
                    @if($busqueda)

                        <a href="{{ route('clientes.index') }}"
                           class="btn btn-tool btn-outline-primary text-danger" {{--target="_blank"--}}>
                            <i class="fas fa-list"></i> Ver Todos
                        </a>

                    @endif
                    @if($clientes->isNotEmpty())
                            @if(leerJson(Auth::user()->permisos, 'clientes.excel') || Auth::user()->role == 1 || Auth::user()->role == 100)
                                <a href="{{ route('clientes.excel') }}"
                                   class="btn btn-tool text-success swalDefaultInfo" {{--target="_blank"--}}>
                                    <i class="fas fa-file-excel"></i> <i class="fas fa-download"></i>
                                </a>
                            @endif
                    @endif

                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @include('dashboard.clientes.table')

            </div>
            <!-- /.card-body -->
            <div class="overlay-wrapper" wire:loading>
                <div class="overlay">
                    <i class="fas fa-2x fa-sync-alt"></i>
                </div>
            </div>
        </div>

        <div class="row justify-content-end p-3">
            <div class="col-md-3">
                    <span>
                    {{ $clientes->render() }}
                    </span>
            </div>
        </div>

    </div>




</div>
