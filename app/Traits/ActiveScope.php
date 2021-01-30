<?php
namespace App\Traits;
trait ActiveScope{
  public function scopeActive($query)
  {
    return $query->where('status', 1);
  }
}