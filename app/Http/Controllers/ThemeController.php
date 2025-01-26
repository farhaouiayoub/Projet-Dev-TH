<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Theme;
use App\Models\User;

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



        // app/Http/Controllers/ThemeController.php
    public function manageResponsables()
    {
        return view('admin.themes.responsables', [
            'themes' => Theme::with('responsables')->get(),
            'responsables' => User::where('role', Role::Responsable)->get()
        ]);
    }

    public function assignResponsable(Request $request, Theme $theme)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        $user = User::findOrFail($request->user_id);

        if(!$user->isResponsable()) {
            return back()->withErrors(['user_id' => 'Cet utilisateur n\'est pas un responsable']);
        }

        $theme->responsables()->syncWithoutDetaching($user);

        return back()->with('success', 'Responsable assigné avec succès');
    }

}
