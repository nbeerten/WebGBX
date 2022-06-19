<?php

namespace App\Classes\MedalTime;

class MedalTime 
{
    protected $ms;
    protected $string;

    function __construct($ms) {
        $this->ms = intval($ms);
    }
     
    public function format($ms_in){
        $ms = $ms_in % 1000;
        $s = ($ms_in / 1000) % 60;
        $m = ($ms_in / (60*1000)) % 60;
        $h = ($ms_in / (60*60*1000)) % 24;  

        if($h > 0) {
            $string = sprintf("%02d:%02d:%02d.%03d", $h, $m, $s, $ms);
        } else {
            $string = sprintf("%01d:%02d.%03d", $m, $s, $ms);
        }

        $this->string = $string;
        return $string;
    }
    
    public function __toString() {
        $this->format($this->ms);
        return $this->string;
    }
}