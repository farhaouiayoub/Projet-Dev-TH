<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;



class ResponsableController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function abonnes()
    {
        $abonnes = Auth::user()->getSubscribersForResponsable();
        $themes = Auth::user()->managedThemes;

        return view('responsable.abonnes', compact('abonnes', 'themes'));
    }

    public function desabonner(User $user, Theme $theme)
    {
        if(Auth::user()->managedThemes->contains($theme)) {
            $user->subscribedThemes()->detach($theme->id);
            return back()->with('success', 'Abonnement supprimé');
        }

        return back()->withErrors(['error' => 'Action non autorisée']);
    }


}
