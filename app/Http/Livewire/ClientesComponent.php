<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ClientesComponent extends Component
{
    use LivewireAlert;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'confirmed'
    ];

    public $view = 'create', $rif, $nombre, $direccion, $telefono, $email;
    public $clientes_id, $busqueda;

    public function mount(Request $request)
    {
        if (!is_null($request->buscar)){
            $this->busqueda = $request->buscar;
        }
    }

    public function render()
    {
        $clientes = Cliente::buscar($this->busqueda)->orderBy('id', 'DESC')->paginate(30);
        return view('livewire.clientes-component')
            ->with('clientes', $clientes);
    }

    public function limpiar()
    {
        $this->rif = null;
        $this->nombre = null;
        $this->direccion = null;
        $this->telefono = null;
        $this->email = null;
        $this->view = 'create';
        $this->clientes_id = null;
    }

    public function rules()
    {
        return [
            'rif'           =>  ['required', 'between:6,12', Rule::unique('clientes')->ignore($this->clientes_id)],
            'nombre'        =>  'required|min:4',
            'direccion'     =>  'required',
            'telefono'      =>  'numeric|nullable',
            'email'         =>  'email|nullable'
        ];
    }

    public function store()
    {
        $this->validate();

        $cliente = new Cliente();
        $cliente->rif = strtoupper($this->rif);
        $cliente->nombre = strtoupper($this->nombre);
        $cliente->direccion = strtoupper($this->direccion);
        $cliente->telefono = $this->telefono;
        $cliente->email = strtolower($this->email);
        $cliente->save();

        $this->clientes_id = $cliente->id;
        $this->view = 'edit';

        $this->alert(
            'success',
            'Datos Guardados.'
        );

    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $this->clientes_id = $cliente->id;
        $this->rif = strtoupper($cliente->rif);
        $this->nombre = strtoupper($cliente->nombre);
        $this->direccion = strtoupper($cliente->direccion);
        $this->telefono = $cliente->telefono;
        $this->email = $cliente->email;
        $this->view = 'edit';
    }

    public function update($id)
    {
        $this->validate();

        $cliente = Cliente::find($id);
        $cliente->rif = strtoupper($this->rif);
        $cliente->nombre = strtoupper($this->nombre);
        $cliente->direccion = strtoupper($this->direccion);
        $cliente->telefono = $this->telefono;
        $cliente->email = strtolower($this->email);
        $cliente->update();

        $this->edit($id);

        $this->alert(
            'success',
            'Datos Guardados.'
        );
    }

    public function destroy($id)
    {
        $this->clientes_id = $id;
        $this->confirm('¿Estas seguro?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  '¡Sí, bórralo!',
            'text' =>  '¡No podrás revertir esto!',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'confirmed',
        ]);
    }

    public function confirmed()
    {
        // Example code inside confirmed callback
        $parametro = Cliente::find($this->clientes_id);
        $parametro->delete();
        $this->limpiar();
        $this->alert(
            'success',
            'Cliente Eliminado'
        );

    }

}
