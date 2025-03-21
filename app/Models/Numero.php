<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Numero extends Model
{

    use HasFactory;


    public function articles()
    {
        return $this->hasMany(Article::class);
    }


}
