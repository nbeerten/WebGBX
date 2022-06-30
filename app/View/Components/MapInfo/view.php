<?php

namespace App\View\Components\MapInfo;

use Illuminate\View\Component;

class view extends Component
{

    public $map;
    public $OnlineMapServices;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.map-info.view');
    }
}