<?php

namespace App\Models;

use App\Enums\Role;
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



    public function responsables() // explication : un thème peut avoir plusieurs responsables
    {
        return $this->belongsToMany(User::class, 'theme_responsable')
                    ->where('role', Role::Responsable->value)
                    ->withTimestamps();
    }

}
