<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    //Add the below functions
    public function __construct()
    {
    
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chat');
    }

    public function fetchMessages(Request $request)
    {
        return Message::with('user')->where('offer_id',$request->request_id)->where('type',$request->type)->get();
    }

    public function sendMessage(Request $request)
    {
        // return $request;
        $user = Auth::user();
        $message = $user->messages()->create([
            'message' => $request->input('message'),
            'offer_id' => $request->input('offer_id'),
            'type' => $request->input('type')
        ]);
        broadcast(new MessageSent($user, $request->message,$request->offer_id))->toOthers();
        return ['status' => 'Message Sent!'];
        
    }
}