<form @if($view == 'create') wire:submit.prevent="store" @else wire:submit.prevent="update({{ $clientes_id }})"  @endif>

    <div class="form-group">
        <label for="name">RIF</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
            </div>
            <input type="text" wire:model.defer="rif" class="form-control" placeholder="[rif]">
            @error('rif')
            <span class="col-sm-12 text-sm text-bold text-danger">
                <i class="icon fas fa-exclamation-triangle"></i>
                {{ $message }}
            </span>
        @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="email">Nombre o Razón Social</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-book"></i></span>
            </div>
            <input type="text" wire:model.defer="nombre" class="form-control" placeholder="[nombre]">
            @error('nombre')
            <span class="col-sm-12 text-sm text-bold text-danger">
                <i class="icon fas fa-exclamation-triangle"></i>
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="name">Dirección:</label>
        <div class="input-group mb-3">
            <textarea wire:model.defer="direccion" class="form-control" cols="1" rows="1" {{--wire:model.defer="direccion"--}} placeholder="[dirección]"></textarea>
            @error('direccion')
            <span class="col-sm-12 text-sm text-bold text-danger">
                <i class="icon fas fa-exclamation-triangle"></i>
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="email">Teléfono</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-book"></i></span>
            </div>
            <input type="text" wire:model.defer="telefono" class="form-control" placeholder="[telefono]">
            @error('telefono')
            <span class="col-sm-12 text-sm text-bold text-danger">
                <i class="icon fas fa-exclamation-triangle"></i>
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="text" wire:model.defer="email" class="form-control" placeholder="[email]">
            @error('email')
            <span class="col-sm-12 text-sm text-bold text-danger">
                <i class="icon fas fa-exclamation-triangle"></i>
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>


    <div class="form-group text-right">
        @if($view == 'create')
            <input type="submit" class="btn btn-block btn-success" value="Guardar">
            @else
            <input type="submit" class="btn btn-block btn-primary" value="Guardar Cambios">
        @endif

    </div>

</form>
