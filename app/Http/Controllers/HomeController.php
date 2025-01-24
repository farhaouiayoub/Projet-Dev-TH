<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(): View
    {
        $themes = Theme::all();
        $history = Auth::user()->browsingHistories()
                    ->with('article')
                    ->latest('viewed_at')
                    ->paginate(10);

        $filters = request()->only(['search', 'theme', 'date']);

        return view('home.index', compact('themes', 'history', 'filters'));
    }


    public function updatetheme(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate([
            'theme_id' => ['required', 'array'],
            'theme_id.*' => ['exists:themes,id']
        ]);

        $user->themes()->sync($validated['theme_id']);

        return redirect()->route('home')->withStatus('Abonment registré');


    }






    public function updatePassword(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => [
                'required',
                'string',
                function (string $attribute, mixed $value, Closure $fail) use ($user) {
                    if (! Hash::check($value, $user->password)) {
                        $fail("Le :attribute est erroné.");
                    }
                },
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('home')->withStatus('Mot de passe modifié');
    }







    public function history(Request $request): View
{
    $query = Auth::user()->browsingHistories()
                ->with(['article.theme'])
                ->filter($request->all())
                ->latest('viewed_at');

    return view('history.historique', [
        'history' => $query->paginate(10),
        'themes' => Theme::all(),
        'filters' => $request->all()
    ]);
}

}
