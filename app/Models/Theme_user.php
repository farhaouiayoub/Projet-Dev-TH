<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme_user extends Model
{



    public function theme()
    {
    return $this->belongsToMany(Theme::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
