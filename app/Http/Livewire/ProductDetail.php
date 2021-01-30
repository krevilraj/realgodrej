<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductDetail extends Component
{
  public $product;
  public function mount($slug){

    $this->product = \App\Product::where('slug', 'like', '%' . $slug . '%')->firstOrFail();
  }
    public function render()
    {
        return view('livewire.product-detail');
    }
}
