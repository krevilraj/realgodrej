<?php
namespace App\Traits;
use App\User;

trait UserScope{
  public function user()
  {
      return $this->belongsTo( User::class );
  }
}
