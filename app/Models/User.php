<?php

namespace App\Models;
use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function isAbonne(): bool
    {
        return $this->role === Role::Abonne;
    }

    public function isResponsable(): bool
    {
        return $this->role === Role::Responsable;
    }

    public function themes()
    {
        return $this->belongsToMany(Theme::class);
    }

    public function browsingHistories()
    {
        return $this->hasMany(BrowsingHistory::class);
    }


    public function managedThemes()
    {
        return $this->belongsToMany(Theme::class, 'theme_responsable')
                    ->withTimestamps();
    }


        // app/Models/User.php
    public function subscribedThemes()
    {
        return $this->belongsToMany(Theme::class, 'theme_user')
            ->withTimestamps();
    }

    public function getSubscribersForResponsable()
    {
        return User::whereHas('subscribedThemes', function($query) {
            $query->whereIn('theme_id', $this->managedThemes()->pluck('id'));
        })->with('subscribedThemes')->get();
    }








}
