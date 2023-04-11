<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LotController extends Controller
{
    public function show(Lot $lot): View
    {
        return view('lots.view', [
            'lot' => $lot,
            'items' => $lot->items
        ]);
    }
}
