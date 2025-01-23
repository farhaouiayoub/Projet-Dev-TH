<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\article;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Numero;
use App\Models\theme;
use App\Models\User;

class statistiqueController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $articles = article::all();
        $Tags = Tag::all();
        $users = User::all();
        $commentaires = Comment::all();
        $themes = theme::all();
        $numeros = Numero::all();

        return view('admin.Static.index', compact('articles', 'users', 'commentaires', 'themes','numeros','Tags'));
}
}
