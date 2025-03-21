<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\article;
use App\Models\Tag;
use App\Models\theme;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\PostRequest;
use App\Models\Numero;
use App\Models\User;
use Illuminate\View\View;




class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.articles.index', [
            'articles' => article::without('theme', 'tags' , 'Numero')->latest()->get(),
        ]);
    }



    public function indexuser()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }


    public function create(): View
    {
        return $this->showForm();
    }


    public function edit(article $article)
    {
        return $this->showForm($article);
    }

    protected function showForm(article $article = new article): View
    {
        return view('admin.articles.form', [
            'article' => $article,
            'themes' => theme::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get(),
            'numeros' => Numero::orderBy('description')->get(),

        ]);
    }


    public function store(PostRequest $request): RedirectResponse
    {
        return $this->save($request->validated());

    }


    public function update(PostRequest $request, article $article): RedirectResponse
    {
        return $this->save($request->validated(), $article);
    }



    protected function save(array $data, article $article = null): RedirectResponse
    {

        if (isset($data['image'])) {
            if ($article?->image) {
                Storage::disk('public')->delete($article->image); // Supprime l'ancienne image
            }
            $path = $data['image']->store('images', 'public'); // Stocke la nouvelle image
            $data['image'] = $path;
        }

        $data['excerpt'] = Str::limit($data['content'], 150);

        $article = article::updateOrCreate(['id' => $article?->id], $data);
        $article->tags()->sync($data['tag_ids'] ?? null);

        return redirect()->route('Articles.show', ['article' => $article])->withStatus(
            $article->wasRecentlyCreated ? 'article publié !' : 'article mis à jour !'
        );

    }


    public function destroy(article $article)
    {
        $article->ratings()->delete();      // Supprimer les ratings associés en premier

            // Puis supprimer l'article
        Storage::delete($article->image);
        $article->delete();

        return redirect()->route('admin.articles.index');
    }

    public function destroyuser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé');
    }
}
