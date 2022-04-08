<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Models\Subscribers;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Website $website)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $subscriber = Subscribers::firstOrCreate([
            'website_id' => $website->id,
            'email' => $request->email,
        ]);

        return response()->json([
            'message' => "$subscriber->email, You have been subscribed successfully.",
        ], 201);
    }
}
