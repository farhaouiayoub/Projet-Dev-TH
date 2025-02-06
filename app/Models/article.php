<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory; // explication : il s'agit d'un trait qui permet de générer des données de test pour les modèles


    protected $guarded = ['id', 'created_at', 'updated_at']; // explication : permet de protéger les champs de la table


    protected $with = [  // explication : permet de charger les relations avec le modèle
        'theme',      // exx
        'tags',
        'numero'
    ];



    public function getRouteKeyName() :String
    {
        return 'slug';
    }


    public function scopeFilters(Builder $query, array $filters): void
    {
        if(isset($filters['search'])){
            $query->where(fn (Builder $query)=> $query
            ->where('title', 'LIKE', '%'  . $filters['search'] . '%')
            ->orWhere('content', 'LIKE', '%'  . $filters['search'] . '%')
            ->orWhereHas('tags', fn (Builder $query)=> $query->where('name', 'LIKE', '%'  . $filters['search'] . '%'))
            ->orWhereHas('theme', fn (Builder $query)=> $query->where('name', 'LIKE', '%'  . $filters['search'] . '%'))
            ->orWhereHas('numero', fn (Builder $query)=> $query->where('description', 'LIKE', '%'  . $filters['search'] . '%'))
            ->orWhereHas('comments', fn (Builder $query)=> $query->where('content', 'LIKE', '%'  . $filters['search'] . '%'))
            );
        }

        if(isset($filters['theme'])){
            $query->where('theme_id', $filters['theme']->id  ?? $filters['theme']
            );
        }

        if(isset($filters['Numero'])){
            $query->where('numero_id', $filters['Numero']->id  ?? $filters['Numero']
            );
        }

        if(isset($filters['tag'])){
            $query->whereRelation('tags' , 'tags.id' , $filters['tag']->id  ?? $filters['tag']
            );
        }
    }


    public function exists(): bool // explication : permet de vérifier si l'article existe
    {
        return (bool) $this->id;
    }


    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }


    public function tags(): BelongsToMany // explication : permet de définir la relation entre les articles et les tags
    {
        return $this->belongsToMany(Tag::class); // belongsToMany : (1,n) relation de plusieurs à plusieurs
    }


    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest(); 
    }


    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }


    public function numero()
    {
        return $this->belongsTo(Numero::class);
    }
}
