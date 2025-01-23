<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Theme extends Model
{

    use HasFactory;



    public function getRouteKeyName() :String
    {
        return 'slug';
    }

    public function articles(): HasMany
    {
        return $this->hasMany(article::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }









}
