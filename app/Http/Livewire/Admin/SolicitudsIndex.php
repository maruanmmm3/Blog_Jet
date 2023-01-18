<?php

namespace App\Http\Livewire\Admin;

use App\Models\Solicitud;
use Livewire\Component;

use Livewire\WithPagination;

class SolicitudsIndex extends Component
{

    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";


    public function render()
    {
        $solicituds = Solicitud::where('status', 'LIKE','%' . $this->search . '%')
                                ->orwhere('descripcion', 'LIKE', '%' . $this->search . '%')
                                ->paginate();

        return view('livewire.admin.solicituds-index', compact('solicituds'));
    }
}
