<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination; /* Para Poder usar la Paginacion con Livewire */

class PostsIndex extends Component
{
    use WithPagination; /* Para decirle que queremos utilizarla */

    protected $paginationTheme = "bootstrap"; /* Para que use los diseños de bootstrap en la Paginacion */

    public $search; /* Variable publica */

    public function updatingSearch(){ /* Se activa cuando search cambia su valor */
        $this->resetPage();/* Para que busque caundo estes en otra pagina */
    }

    public function render()/* Tomamos este metodo como si fuera un Controlador */
    {
        /* Los Post de usuario actualmente autentificado */
        /* El campo user_id debe de concidir con el id del usuario actualmente autentificado */ 
        /* Recuperar registro del usuario actualmente autentificado     auth()->user()->id */
        $posts = Post::where('user_id', auth()->user()->id)
                    ->where('name', 'LIKE','%' . $this->search . '%') /* PARA QUE ANTES O DESPUES VALLA CAMBIANDO EL FILTRO */
                    ->latest('id')
                    ->paginate();

        return view('livewire.admin.posts-index', compact('posts'));
    }
}
