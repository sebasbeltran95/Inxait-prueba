<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sorteo extends Component
{
    public function render()
    {
        return view('livewire.sorteo')->extends('layouts.plantilla')->section('content');
    }
}
