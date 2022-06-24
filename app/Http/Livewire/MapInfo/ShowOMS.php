<?php

namespace App\Http\Livewire\MapInfo;

use Livewire\Component;

use App\Classes\OnlineMapServices\OnlineMapServices;

class ShowOMS extends Component
{
    public string $uid;
    public bool $readyToLoad = false;
    public $OnlineMapServices;
 
    public function loadOMS()
    {
        $this->readyToLoad = true;

        $omp = new OnlineMapServices($this->uid);
        $this->OnlineMapServices = $omp->get();
    }

    public function render()
    {
        return view('livewire.map-info.show-o-m-s', [
            'OnlineMapServices' => $this->readyToLoad
                ? $this->OnlineMapServices
                : null
        ]);
    }
}
