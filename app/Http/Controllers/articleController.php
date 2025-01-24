<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\BrowsingHistory;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Numero;
use App\Models\theme;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class articleController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->only('comment');
    }


    public function index(Request $request):View
    {
        return $this->articlesView($request->search ? ['search' => $request->search] : []);
    }


    public function articlesByTheme(theme $theme):View
    {
        return $this->articlesView(['theme' => $theme]);
    }


    public function articlesByNumero(Numero $Numero):View
    {
        return $this->articlesView(['Numero' => $Numero]);
    }


    public function articlesByTag(Tag $tag):View
    {
        return $this->articlesView(['tag' => $tag]);
    }


    protected function articlesView(array $filtres): View
    {
        return view('Articles.index', [
            'articles' => article::filters($filtres)->latest()->paginate(6),
        ]);
    }



    public function show(Article $article): View
    {
        if(Auth::check()) {
            BrowsingHistory::create([
                'user_id' => Auth::id(),
                'article_id' => $article->id,
                'viewed_at' => now()
            ]);
        }

        return view('Articles.show', [
            'article' => $article,
        ]);
    }


    

    public function comment(article $article, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'comment' => ['required', 'string', 'between:2,255'],
        ]);

        Comment::create([
            'content' => $validated['comment'],
            'article_id' => $article->id,
            'user_id' => Auth::id(),
        ]);

        return back()->withStatus('Commentaire publié !');
    }




    public function rate(Article $article, Request $request)
    {

        try {
            $validated = $request->validate([
                'rating' => 'required|integer|between:1,5'
            ]);

            $article->ratings()->updateOrCreate(
                ['user_id' => Auth::id()],
                ['rating' => $validated['rating']]
            );

            return back()->withStatus('Merci pour votre notation !');
        } catch (\Exception $e) {
            dd($e->getMessage()); // Affichez l'erreur SQL
        }


    }


}






