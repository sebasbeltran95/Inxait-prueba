<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Usuarios extends Component
{
    public function render()
    {
        return view('livewire.usuarios')->extends('layouts.plantilla_back')->section('contenido');
    }
}
