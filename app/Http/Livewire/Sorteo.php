<?php

namespace App\Http\Livewire;

use App\Models\Clientes;
use Livewire\Component;

class Sorteo extends Component
{
    public $totalClientes;
    public $ganador;


    public function mount()
    {
        $this->totalClientes = Clientes::count();
        $this->ganador = null;
    }

    public function seleccionarGanador()
    {
        $this->totalClientes = Clientes::count();

        if ($this->totalClientes < 5) {
            session()->flash('error', 'Debe haber al menos 5 usuarios para seleccionar un ganador.');
            $this->ganador = null;
            return;
        }

        $this->ganador = Clientes::inRandomOrder()->first();
    }


    public function render()
    {
        return view('livewire.sorteo')->extends('layouts.plantilla')->section('content');
    }
}
