<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function show(): View
    {
        return view('home', [
            'lots' => Lot::published()->get(),
            'featured_items' => Item::featured()->get()
        ]);
    }
}
