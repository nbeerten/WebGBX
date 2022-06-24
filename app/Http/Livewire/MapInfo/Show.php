<?php

namespace App\Http\Livewire\MapInfo;

use Livewire\Component;

class Show extends Component
{
    public $map;
    
    public function render()
    {
        return view('livewire.map-info.show');
    }
}
