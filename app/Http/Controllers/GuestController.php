<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;

class GuestController extends Controller
{
    public function indexGuest()
    {
        $themes = Theme::select('name', 'description','created_at')->paginate(6); // Récupérez uniquement les noms et descriptions des thèmes
        return view('guest.themes', compact('themes'));




    }
}
