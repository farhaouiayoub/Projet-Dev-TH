<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;


class Defaultlayout extends AbstractLayout
{

    public function render(): View|Closure|string
    {
        return view('layouts.default');
    }
}
