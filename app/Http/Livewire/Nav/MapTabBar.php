<?php

namespace App\Http\Livewire\Nav;

use Livewire\Component;

// Added
use Illuminate\Support\Facades\Cache;

class MapTabBar extends Component
{
    public $openmaps;

    public function delete($id)
    {
        Cache::forget('mapinfo/'.$id);
        Cache::forget('thumbnail/'.$id);
        session()->forget(['mapinfo.' . $id, 'mapthumbnail.' . $id]);
        $openmaps = session()->get('user.openmaps'); // Second argument is a default value
        foreach ($openmaps as $key => $val) {
            if ($val['uid'] === $id) {
                unset($openmaps[$key]);
            }
        }
        session()->put('user.openmaps', $openmaps);
    }

    public function deleteAll()
    {
        if(null !== session('user.openmaps')) {
            foreach (session('user.openmaps') as $map)
            $this->delete($map['uid']);
        }
    }

    public function render()
    {
        $this->openmaps = session('user.openmaps');
        return view('livewire.nav.map-tab-bar');
    }
}
