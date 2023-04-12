<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBidRequest;
use App\Models\Bid;
use App\Models\Item;
use App\Models\Lot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function show(Item $item): View
    {
        return view('items.view', [
            'item' => $item
        ]);
    }

    public function bid(StoreBidRequest $request, Item $item):RedirectResponse
    {
        $validated = $request->validated();
        $highest_bid = $item->highestBid;

        $bid = new Bid();
        if($validated['amount'] <= $highest_bid->amount ){
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'amount' => ['Looks like someone already bid higher, please try again'],
            ]);
            throw $error;
        }
        $bid->amount = $validated['amount'] ;
        $bid->bid_at = now();
        $bid->item()->associate($item);
        $bid->user()->associate(auth()->user());

        $bid->save();

        return Redirect::route('items.view', [$item])->with('status', 'bid_placed');

    }
}
