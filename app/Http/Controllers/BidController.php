<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditBidRequest;
use App\Models\Bid;
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

    public function edit(EditBidRequest $request, Bid $bid): RedirectResponse
    {
        $validated = $request->validated();
        $highest_bid = $bid->item->highestBid;

        if ($highest_bid) {
            // Check if your new bid is not lower than the highest bid
            if ($validated['amount'] <= $highest_bid->amount) {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'amount' => ['Looks like someone already bid higher, please try again'],
                ]);
                throw $error;
            }
            // Check if editing your bid doesn't outbid anyone
            if ($highest_bid->user_id !== Auth::id()) {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'user_id' => ['Looks like another person already bid higher. Editing your current bid is not permitted. Please make a new bid.'],
                ]);
                throw $error;
            }
        }

        $bid->amount = $validated['amount'];
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
