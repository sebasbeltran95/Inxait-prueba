<?php

namespace App\Http\Livewire;

use App\Models\Clientes;
use Livewire\Component;
use Illuminate\Database\QueryException;

class Cliente extends Component
{
    public $nombre, $apellido, $cedula, $departamento, $ciudad, $celular, $email, $habeas_data; 

    public $departamentos = [
        'Amazonas'          => ['Leticia', 'Puerto Nariño', 'La Chorrera', 'La Victoria'],            
        'Antioquia'         => ['Medellín', 'Bello', 'Itagüí', 'Envigado'],                        
        'Arauca'            => ['Arauca', 'Saravena', 'Tame', 'Arauquita'],                      
        'Atlántico'         => ['Barranquilla', 'Soledad', 'Malambo', 'Galapa'],                   
        'Bogotá, D.C.'      => ['Bogotá'],                                                        
        'Bolívar'           => ['Cartagena', 'Magangué', 'Achí'],                                 
        'Boyacá'            => ['Tunja', 'Duitama', 'Sogamoso'],                                 
        'Caldas'            => ['Manizales', 'Villamaría', 'Chinchiná'],                          
        'Caquetá'           => ['Florencia', 'Puerto Rico', 'Morelia'],                           
        'Casanare'          => ['Yopal', 'Aguazul', 'Tauramena'],                               
        'Cauca'             => ['Popayán', 'Santander de Quilichao', 'Puerto Tejada'],            
        'Cesar'             => ['Valledupar', 'Aguachica', 'Bosconia'],                           
        'Chocó'             => ['Quibdó', 'Istmina', 'Nuquí'],                                   
        'Córdoba'           => ['Montería', 'Cereté', 'Lorica'],                                  
        'Cundinamarca'      => ['Bogotá', 'Soacha', 'Chía'],                                      
        'Guainía'           => ['Inírida'],                                                      
        'Guaviare'          => ['San José del Guaviare'],                                          
        'Huila'             => ['Neiva', 'Pitalito', 'Garzón'],                                   
        'La Guajira'        => ['Riohacha', 'Maicao', 'Uribia'],                                 
        'Magdalena'         => ['Santa Marta', 'Ciénaga', 'Fundación'],                           
        'Meta'              => ['Villavicencio', 'Acacías', 'Granada'],                           
        'Nariño'            => ['Pasto', 'Ipiales', 'Tumaco'],                                    
        'Norte de Santander'=> ['Cúcuta', 'Ocaña', 'Villa del Rosario'],                        
        'Putumayo'          => ['Mocoa', 'Puerto Asís', 'Colón'],                                 
        'Quindío'           => ['Armenia', 'Calarcá', 'Pereira'],  
        'Risaralda'         => ['Pereira', 'Dosquebradas', 'Santa Rosa de Cabal'],               
        'San Andrés y Providencia'=> ['San Andrés', 'Providencia'],                             
        'Santander'         => ['Bucaramanga', 'Floridablanca', 'Girón'],                        
        'Sucre'             => ['Sincelejo', 'Tolú', 'Corozal'],                                 
        'Tolima'            => ['Ibagué', 'Espinal', 'Lérida'],                                  
        'Valle del Cauca'   => ['Cali', 'Palmira', 'Buenaventura'],                              
        'Vaupés'            => ['Mitú'],                                                          
        'Vichada'           => ['Puerto Carreño', 'Cumaribo'],                                   
    ];

    public $ciudadesDisponibles = [];

    public function updatedDepartamento($value)
    {
        $this->ciudad = null;
        $this->ciudadesDisponibles = $this->departamentos[$value] ?? [];
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
                'habeas_data' => 'required',
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
                'habeas_data.required' => 'El campo Habeas Data es obligatorio',
            ]);
    
            $usuario_existe = Clientes::where('cedula', $this->cedula)->first();     

            if($usuario_existe == null){
        
                $cliente = new Clientes();
                $cliente->nombre =  $this->nombre;
                $cliente->apellido =  $this->apellido;
                $cliente->cedula =  $this->cedula;
                $cliente->departamento =  $this->departamento;
                $cliente->ciudad =  $this->ciudad;
                $cliente->celular =  $this->celular;
                $cliente->email =  $this->email;
                $cliente->habeas_data = $this->habeas_data;
                $cliente->save();

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
