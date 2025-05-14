<?php

namespace App\Exports;

use App\Models\Clientes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use function Laravel\Prompts\select;

class ClientesExports implements FromCollection, WithHeadings
{
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function headings(): array
    {
        return [
            'nombre',
            'apellido',
            'cedula',
            'departamento',
            'ciudad',
            'celular',
            'email'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->data != ''){
            return Clientes::orWhere('nombre', 'LIKE', '%'.$this->data.'%')
            ->orWhere('apellido', 'LIKE', '%'.$this->data.'%')
            ->orWhere('cedula', 'LIKE', '%'.$this->data.'%')
            ->orWhere('departamento', 'LIKE', '%'.$this->data.'%')
            ->orWhere('ciudad', 'LIKE', '%'.$this->data.'%')
            ->orWhere('celular', 'LIKE', '%'.$this->data.'%')
            ->orWhere('email', 'LIKE', '%'.$this->data.'%')
            ->select('nombre', 'apellido', 'cedula', 'departamento', 'ciudad', 'celular', 'email')->get();
        } else {
             return Clientes::select('nombre', 'apellido', 'cedula', 'departamento', 'ciudad', 'celular', 'email')->get();
        }
    }
}
