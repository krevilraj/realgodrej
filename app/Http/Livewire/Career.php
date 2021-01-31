<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Career extends Component
{
    public function render()
    {
        $careers = \App\Career::latest()->get();
        return view('livewire.career',compact('careers'));
    }
}
