<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CareerDetail extends Component
{
    public $career;
    public function mount($id){

        $this->career = \App\Career::firstOrFail();
    }
    public function render()
    {
        return view('livewire.career-detail');
    }
}
