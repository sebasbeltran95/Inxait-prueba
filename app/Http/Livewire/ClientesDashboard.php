<?php

namespace App\Http\Livewire;

use App\Exports\ClientesExports;
use App\Models\Clientes;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;


class ClientesDashboard extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $nombre, $apellido, $cedula, $departamento, $ciudad, $celular, $email; 
    public $idx, $nombrex, $apellidox, $cedulax, $departamentox, $ciudadx, $celularx, $emailx; 
    public $search;

    protected $listeners = ['render', 'delete'];

        public function updatingSearch()
    {
        $this->resetPage();
    }

        public function getClientesProperty()
    {
        if($this->search == ""){
            return Clientes::orderBy('id','DESC')->paginate(5);
        } else {
            return Clientes::
            orWhere('nombre', 'LIKE', '%'.$this->search.'%')
            ->orWhere('apellido', 'LIKE', '%'.$this->search.'%')
            ->orWhere('cedula', 'LIKE', '%'.$this->search.'%')
            ->orWhere('departamento', 'LIKE', '%'.$this->search.'%')
            ->orWhere('ciudad', 'LIKE', '%'.$this->search.'%')
            ->orWhere('celular', 'LIKE', '%'.$this->search.'%')
            ->orWhere('email', 'LIKE', '%'.$this->search.'%')
            ->paginate(3);
        } 
    }

    public function crear()
    {
        try { 

            $this->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'cedula' => 'required|numeric',
                'departamento' => 'required|string|max:255',
                'ciudad' => 'required|string|max:255',
                'celular' => 'required|numeric',
                'email' => 'required|string|email',
            ],[
                'nombre.required' => 'El campo Nombre es obligatorio',
                'nombre.string' => 'El campo Nombre recibe solo cadena de texto',
                'nombre.max' => 'El campo Nombre debe contener maximo 255 caracteres',
                'apellido.required' => 'El campo Apellido es obligatorio',
                'apellido.string' => 'El campo Apellido recibe solo cadena de texto',
                'apellido.max' => 'El campo Apellido debe contener maximo 255 caracteres',
                'cedula.required' => 'El campo Cedula es obligatorio',
                'cedula.numeric' => 'El campo Cedula recibe solo numeros enteros',
                'departamento.required' => 'El campo Departamento es obligatorio',
                'departamento.string' => 'El campo Departamento recibe solo cadena de texto',
                'departamento.max' => 'El campo Departamento debe contener maximo 255 caracteres',
                'ciudad.required' => 'El campo Ciudad es obligatorio',
                'ciudad.string' => 'El campo Ciudad recibe solo cadena de texto',
                'ciudad.max' => 'El campo Ciudad debe contener maximo 255 caracteres',
                'celular.required' => 'El campo Celular es obligatorio',
                'celular.numeric' => 'El campo Celular recibe solo numeros enteros',
                'email.required' => 'El campo Email es obligatorio',
                'email.string' => 'El campo Email recibe solo cadena de texto',
                'email.email' => 'El campo Email le falta el @',
            ]);
    
            $usuario_existe = Clientes::where('cedula', $this->cedula)->first();     

            if($usuario_existe == null){
        
                $user = new Clientes();
                $user->nombre =  $this->nombre;
                $user->apellido =  $this->apellido;
                $user->cedula =  $this->cedula;
                $user->departamento =  $this->departamento;
                $user->ciudad =  $this->ciudad;
                $user->celular =  $this->celular;
                $user->email =  $this->email;
                $user->save();

                $this->reset();
                $msj = ['!Registrado!', 'Se registro el cliente', 'success'];
                $this->emit('ok', $msj);
            } else {
                $msj = ['!ERROR!', 'El cliente ya existe', 'danger'];
                $this->emit('ok', $msj);
            }
        } catch (QueryException $e) {

            $msj = ['!ERROR!', 'se ha presentado un error: ', $e, 'danger'];
            $this->emit('ok', $msj);

        }
    }

    public function cargaclientes($obj)
    {
        $this->idx =  $obj['id'];
        $this->nombrex =  $obj['nombre'];
        $this->apellidox =  $obj['apellido'];
        $this->cedulax =  $obj['cedula'];
        $this->departamentox =  $obj['departamento'];
        $this->ciudadx =  $obj['ciudad'];
        $this->celularx =  $obj['celular'];
        $this->emailx =  $obj['email'];
    }


        public function actua()
    {
        try { 

            $this->validate([
                'nombrex' => 'required|string|max:255',
                'apellidox' => 'required|string|max:255',
                'cedulax' => 'required|numeric',
                'departamentox' => 'required|string|max:255',
                'ciudadx' => 'required|string|max:255',
                'celularx' => 'required|numeric',
                'emailx' => 'required|string|email',
            ],[
                'nombrex.required' => 'El campo Nombre es obligatorio',
                'nombrex.string' => 'El campo Nombre recibe solo cadena de texto',
                'nombrex.max' => 'El campo Nombre debe contener maximo 255 caracteres',
                'apellidox.required' => 'El campo Apellido es obligatorio',
                'apellidox.string' => 'El campo Apellido recibe solo cadena de texto',
                'apellidox.max' => 'El campo Apellido debe contener maximo 255 caracteres',
                'cedulax.required' => 'El campo Cedula es obligatorio',
                'cedulax.numeric' => 'El campo Cedula recibe solo numeros enteros',
                'departamentox.required' => 'El campo Departamento es obligatorio',
                'departamentox.string' => 'El campo Departamento recibe solo cadena de texto',
                'departamentox.max' => 'El campo Departamento debe contener maximo 255 caracteres',
                'ciudadx.required' => 'El campo Ciudad es obligatorio',
                'ciudadx.string' => 'El campo Ciudad recibe solo cadena de texto',
                'ciudadx.max' => 'El campo Ciudad debe contener maximo 255 caracteres',
                'celularx.required' => 'El campo Celular es obligatorio',
                'celularx.numeric' => 'El campo Celular recibe solo numeros enteros',
                'emailx.required' => 'El campo Email es obligatorio',
                'emailx.string' => 'El campo Email recibe solo cadena de texto',
                'emailx.email' => 'El campo Email le falta el @',
            ]);

            $data = Clientes::find($this->idx);
            $data->nombre = $this->nombrex;
            $data->apellido = $this->apellidox;
            $data->cedula = $this->cedulax;
            $data->departamento = $this->departamentox;
            $data->ciudad = $this->ciudadx;
            $data->celular = $this->celularx;
            $data->email = $this->emailx;

    
            $data->save();
            $msj = ['!Actualizado!', 'Se actualizo el cliente', 'success'];
            $this->emit('ok', $msj);

          } catch (QueryException $e) {

            $msj = ['!ERROR!', 'se ha presentado un error: ', $e, 'danger'];
            $this->emit('ok', $msj);

        }
    }


    public function export(){
        return Excel::download(new ClientesExports($this->search), 'clientes.xlsx');
    }

    public function delete($post)
    {
        Clientes::where('id',$post)->first()->delete();
    }


    public function render()
    {
        return view('livewire.clientes-dashboard')->extends('layouts.plantilla_back')->section('contenido');
    }
}
