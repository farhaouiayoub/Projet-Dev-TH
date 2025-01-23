<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\Tag;
use App\Models\theme;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;
use App\Models\Numero;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return $this->showForm();
    }


    /**
     * Show the form for editing the specified resource.
     */
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        return $this->save($request->validated());

    }

    /**
     * Show the form for editing the specified resource.
     * Update the specified resource in storage.
     */

    public function update(PostRequest $request, article $article): RedirectResponse
    {
        return $this->save($request->validated(), $article);
    }



    protected function save(array $data, article $article = null): RedirectResponse
    {


        if (isset($data['image'])) {
            if ($article?->image) {
                Storage::disk('public')->delete($article->image); // Utilisez le disk 'public'
            }
            //if (isset($article->image)) {
            //Storage::delete($article->image);
            // Modifiez cette ligne
            $path = $data['image']->store('images', 'public'); // Stockage dans public/storage/images
            $data['image'] = $path;
        }

        $data['excerpt'] = Str::limit($data['content'], 150);

        $article = article::updateOrCreate(['id' => $article?->id], $data);
        $article->tags()->sync($data['tag_ids'] ?? null);

        return redirect()->route('Articles.show', ['article' => $article])->withStatus(
            $article->wasRecentlyCreated ? 'article publié !' : 'article mis à jour !'
        );

    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(article $article)
    {
        $article->ratings()->delete();      // Supprimer les ratings associés en premier

            // Puis supprimer l'article
        Storage::delete($article->image);
        $article->delete();

        return redirect()->route('admin.articles.index');
    }
}
