<div class="row justify-content-center">
    <div class="row col-md-12">

        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    {{--<div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="--}}{{--{{ mostrarImagen($file_path, 'large', 'logo', 'public/store-photos/', $t_logo) }}--}}{{--"
                             alt="Logo Tienda">
                    </div>--}}

                    <h3 class="profile-username text-center">{{ $nombre }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>RIF</b> <a class="float-right">{{ $rif }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Telefonos</b> <a
                                class="float-right text-danger">{{ $telefonos }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a
                                class="float-right">{{ strtolower($email) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Dirección</b> <a
                                class="float-right">{{ strtolower($direccion) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Moneda Base</b> <a
                                class="float-right">{{ strtolower($moneda) }}</a>
                        </li>
                    </ul>


                </div>
                <!-- /.card-body -->
            </div>

        </div>

        <div class="col-md-6">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img id="blah" class="img-thumbnail" src="{{ asset($logo) }}" />
                    </div>
                </div>
            </div>

            @if($empresaDefault)
            <ul class="list-group text-sm">
                <li class="list-group-item fondo">
                    Empresa Default
                    <span class="float-right text-bold">{!! empresaDefault($empresaDefault) !!}</span>
                </li>
            </ul>
            @endif

        </div>



    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            @if(!$empresaDefault)
                @if(leerJson(Auth::user()->permisos, 'empresas.edit')|| Auth::user()->role == 1 || Auth::user()->role == 100)
                    <button type="button" class="btn btn-default btn-sm mr-1" wire:click="convertirDefault({{ $empresa_id }})">
                        <i class="fas fa-certificate"></i> Convertir en Default
                    </button>
                @endif
                @if(leerJson(Auth::user()->permisos, 'empresas.destroy')|| Auth::user()->role == 1 || Auth::user()->role == 100)
                    <button type="button" class="btn btn-default btn-sm" wire:click="destroy({{ $empresa_id }})">
                        <i class="fas fa-trash-alt"></i> Borrar Empresa
                    </button>
                @endif
            @endif
            @if(leerJson(Auth::user()->permisos, 'empresas.edit')|| Auth::user()->role == 1 || Auth::user()->role == 100)
                <button type="button" class="btn btn-default btn-sm" wire:click="edit">
                    <i class="fas fa-edit"></i> {{ __('Edit') }} Información
                </button>
            @endif
        </div>
    </div>
</div>
