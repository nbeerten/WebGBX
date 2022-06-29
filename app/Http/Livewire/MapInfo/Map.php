<?php

namespace App\Http\Livewire\MapInfo;

use Livewire\Component;

use App\Classes\OnlineMapServices\OnlineMapServices;

class Map extends Component
{
    // public $readyToLoad = false;

    // public $uid;
    // public $map;

    // protected $listeners = [
    //     'loadMap'
    // ];

    // public function loadMap(string $id)
    // {
    //     $this->uid = $id;
        
    //     $this->map = Session()->get('mapinfo.'.$this->uid);
    //     $this->OnlineMapServices = OnlineMapServices::get($this->uid);
    // }

    // public function render()
    // {
    //     return view('livewire.map-info.map');
    // }

    public $readyToLoad = false;

    public $uid;
    public $map;

    public function loadMap()
    {
        $this->readyToLoad = true;
        
        $this->map = Session()->get('mapinfo.'.$this->uid);
        $this->map = $this->map->all();
    }

    public function render()
    {
        return view('livewire.map-info.map', [
            'map' => $this->readyToLoad
                ? $this->map
                : []
        ]);
    }
}
