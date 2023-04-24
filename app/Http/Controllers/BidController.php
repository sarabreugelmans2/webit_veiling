<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditBidRequest;
use App\Http\Requests\StoreBidRequest;
use App\Models\Bid;
use App\Models\Item;
use App\Models\Lot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BidController extends Controller
{
    public function index(): View
    {
        return view('profile.bids.view', [
            'bids' => Bid::where('user_id', auth()->id())->get()

        ]);
    }

    public function show(Bid $bid): View
    {
        return view('profile.bids.edit', [
            'bid' => $bid

        ]);
    }

    public function edit(EditBidRequest $request, Bid $bid):RedirectResponse
    {
        $validated = $request->validated();
        //TODO:: write code so you can not outbid someone by editing

        $highest_bid = $bid->item->highestBid;
        // Check if your new bid is still the highest bid
        if($highest_bid){
            if ($validated['amount'] <= $highest_bid->amount) {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'amount' => ['Looks like someone already bid higher, please try again'],
                ]);
                throw $error;
            }
        }
        // Check if your new bid didn't outbid anyone
        $bid->amount = $validated['amount'] ;
        $bid->bid_at = now();

        $bid->save();

        return Redirect::route('profile.bids.index', [$bid])->with('status', 'bid_edited');

    }

    public function destroy(Request $request, Bid $bid): RedirectResponse
    {

        $bid->delete();

        return Redirect::route('profile.bids.index')->with('status', 'bid_deleted');
    }


}
