<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Theme;

class ThemeController extends Controller
{

    public function index(): View
    {
        $themes = Theme::all();
        return view('home.index', compact('themes'));
    }

    public function show(Theme $theme): View
    {
        $articles = Article::where('theme_id', $theme->id)->get();
        return view('themes.show', compact('theme', 'articles'));
    }

}
