<?php

namespace App\Http\Livewire\Nav;

use Livewire\Component;

class Openmaps extends Component
{
    public $current;
    
    public $openmaps;
    public bool $readyToLoad = false;

    public function loadopenmaps() 
    {
        $this->readyToLoad = true;

        $this->openmaps = session('user.openmaps');
    }

    public function render()
    {
        $this->openmaps = session('user.openmaps');
        return view('livewire.nav.openmaps');
    }
}
