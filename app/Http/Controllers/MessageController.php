<?php

namespace App\Http\Controllers;

use App\Events\MessageCreatedEvent;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::debug("Message Controller");
        $userConversations = $request->user()->conversations()->get();
        $messages = [];

        foreach ($userConversations as $conversation) {
            $id = $conversation->id;
            $conversationMessages = Message::where('conversation_id', $id)->get()->toArray();
            $messages = array_merge($messages, $conversationMessages);
        }

        return Response::create($messages);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = Message::create(
            array_merge(
                $request->all(),
                ['author_id' => $request->user()->id]
            )
        );

        $event = new MessageCreatedEvent($message);
        broadcast($event);

        Log::debug(Response::create(['message' => $message]));

        return Response::create(['message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\message $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\message $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\message $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\message $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
