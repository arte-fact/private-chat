<?php

namespace App\Http\Controllers;

use App\Friendship;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FriendshipController extends Controller
{

    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        Log::debug("Friendship Controller");
        $response = Response::create(['friendship' => $request->user()->friendships]);
        Log::debug($response);

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::debug("Friendship Controller");
        Log::debug($request);

        $friend = User::where('name', $request->get('user_number'))->first();

        $friendship = Friendship::create([
            'name' => $request->get('user_name'),
            'friend_id' => $friend->id,
            'user_id' => $request->user()->id,
        ]);
        $response = Response::create(['friendship' => json_decode([$friendship])]);

        Log::debug($response);
        return $response;
    }
}
