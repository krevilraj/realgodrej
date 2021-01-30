<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class Search extends Component
{
    private $query;
    private $result_products;
    public function render()
    {
        if(isset(request()->q)){
            $this->query = request()->q;
            $this->result_products = Product::where('name','like','%'.$this->query.'%')
                ->orWhere('slug','like','%'.$this->query.'%')
                ->active()->get();
        }
        return view('livewire.search')->with(['query'=>$this->query,'result_products'=>$this->result_products]);
    }
}
