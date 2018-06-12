<?php

namespace App\Http\Controllers;

use App\User;
use App\UserConversation;
use Illuminate\Http\Request;

class UserConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
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
     * @param  \App\UserConversation  $userConversation
     * @return \Illuminate\Http\Response
     */
    public function show(UserConversation $userConversation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserConversation  $userConversation
     * @return \Illuminate\Http\Response
     */
    public function edit(UserConversation $userConversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserConversation  $userConversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserConversation $userConversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserConversation  $userConversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserConversation $userConversation)
    {
        //
    }
}
