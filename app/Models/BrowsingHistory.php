<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BrowsingHistory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'article_id', 'viewed_at'];  //    protected $dates = ['viewed_at'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class); // Doit pointer vers Article
    }



    public function scopeFilter($query, array $filters)
    {
        return $query->when($filters['search'] ?? false, function($query, $search) {
            $query->whereHas('article', function($query) use ($search) {
                $query->where('title', 'like', '%'.$search.'%')
                      ->orWhere('content', 'like', '%'.$search.'%');
            });
        })
        ->when($filters['theme'] ?? false, function($query, $theme) {
            // Correction : Filtrer directement par theme_id sur la table articles
            $query->whereHas('article', function($query) use ($theme) {
                $query->where('theme_id', $theme);
            });
        })
        ->when($filters['date'] ?? false, function($query, $date) {
            $query->whereDate('viewed_at', $date);
        });
    }




}
