<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    use HasFactory;

    public function userid_func()
        {
            return $this->hasOne(User::class, 'id', 'userID');
        }
}
