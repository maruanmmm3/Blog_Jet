<?php

namespace App\Http\Livewire;

use App\Models\Solicitud;
use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;

class LiveModal extends Component
{
    public $open = false;

    public $status, $descripcion;

    public function save(){
        /* Pasar dato de user_id Es un Observer*/
        Solicitud::create([
            'status' => $this->status,
            'descripcion' => $this->descripcion
        ]);
        /* return dd($this->status, $this->descripcion); */
        $this->reset([
            'open','status','descripcion'
        ]);
    }

    public function render()
    {
        return view('livewire.live-modal');
    }

}
