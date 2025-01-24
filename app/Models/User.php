<?php

namespace App\Models;
use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',    //ayoub test
        'role' => Role::class,
    ];

    public function isAdmin(): bool
    {
        return $this->role === Role::Admin;
    }

    public function isDefault(): bool
    {
        return $this->role === Role::Default;
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class);
    }

    public function browsingHistories()

    {

        return $this->hasMany(BrowsingHistory::class);

    }



}
