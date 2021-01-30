<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class Welcome extends Component
{
  public $featuredProducts;
  public function render()
  {
    $this->featuredProducts = Product::where( 'is_featured', 1 )->orderby( 'id', 'DESC' )->take( 15 )->get();
    return view('livewire.welcome');
  }
}
