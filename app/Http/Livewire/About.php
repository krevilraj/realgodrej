<?php

namespace App\Http\Livewire;

use App\Team;
use Livewire\Component;

class About extends Component
{
  public $team;
    public function render()
    {
      $this->team = Team::latest()->get();
        return view('livewire.about');
    }
}
