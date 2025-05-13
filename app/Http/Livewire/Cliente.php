<?php

namespace App\Http\Livewire;

use App\Models\Clientes;
use Livewire\Component;
use Illuminate\Database\QueryException;

class Cliente extends Component
{
    public $nombre, $apellido, $cedula, $departamento, $ciudad, $celular, $email; 

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
                $msj = ['!Registrado!', 'Se registro el usuario', 'success'];
                $this->emit('ok', $msj);
            } else {
                $msj = ['!ERROR!', 'El usuario ya esta registrado', 'danger'];
                $this->emit('ok', $msj);
            }
        } catch (QueryException $e) {

            $msj = ['!ERROR!', 'se ha presentado un error: ', $e, 'danger'];
            $this->emit('ok', $msj);

        }
    }

    public function render()
    {
        return view('livewire.cliente')->extends('layouts.plantilla')->section('content');
    }
}
