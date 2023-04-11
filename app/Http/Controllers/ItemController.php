<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function show(Item $item): View
    {
        return view('items.view', [
            'item' => $item
        ]);
    }
}
