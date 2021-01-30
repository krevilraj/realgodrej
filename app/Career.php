<?php

namespace App;

use App\Traits\UserScope;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use UserScope;
    protected $fillable = [
        'expire_in',
        'title',
        'description',
        'user_id',
        'status',
    ];

}
