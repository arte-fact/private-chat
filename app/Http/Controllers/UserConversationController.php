<?php

namespace App\Http\Controllers;

use App\User;
use App\ConversationUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::debug("coucou!");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConversationUser  $userConversation
     * @return \Illuminate\Http\Response
     */
    public function show(ConversationUser $userConversation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConversationUser  $userConversation
     * @return \Illuminate\Http\Response
     */
    public function edit(ConversationUser $userConversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConversationUser  $userConversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConversationUser $userConversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConversationUser  $userConversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConversationUser $userConversation)
    {
        //
    }
}
