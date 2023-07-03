<?php

namespace App\Http\Controllers;

use App\Events\SendMessageEvent;
use App\Models\Message;

class SendMessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('channel_id', 1)->get();

        return view('dashboard', compact('messages'));
    }

    public function store(){

        $message = Message::create([
            'content' => request('content'),
            'user_id' => request('user_id'),
            'channel_id' => 1
        ]);

        broadcast(new SendMessageEvent($message))->toOthers();

        return response()->json([
            'message' => 'Message envoyé',
            'data' => $message
        ], 201);
    }
}
