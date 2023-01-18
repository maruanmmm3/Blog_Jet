<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Navigation extends Component
{
    public $showModal = 'hidden';

    /* protected $Listeners = [
        'showModal' => 'sacarModal'
    ]; */

    public function render()
    {
        $categories = Category::all();
        return view('livewire.navigation', compact('categories'));
    }

    public function showModal()
    {
        $this->emit('showModal'); 
    }
}
