<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class Category extends Component
{
  public $category;
  public $category_product;
  public $featuredProducts;
  public function mount($slug)
  {
    $this->featuredProducts = Product::where( 'is_featured', 1 )->orderby( 'id', 'DESC' )->take( 7 )->get();
    $this->category = \App\Category::where('slug', 'like', '%' . $slug . '%')->firstOrFail();
    $this->category_product = $this->category->products;

  }


  public function render()
  {
    return view('livewire.category');
  }
}
