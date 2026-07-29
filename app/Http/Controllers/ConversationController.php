<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;


class ConversationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('landlord')) {

            $conversations = Conversation::with([
                'tenant',
                'property'
            ])
            ->where('landlord_id', $user->id)
            ->latest()
            ->get();

        } else {

            $conversations = Conversation::with([
                'landlord',
                'property'
            ])
            ->where('tenant_id', $user->id)
            ->latest()
            ->get();
        }

        return view('messages.index', compact('conversations'));
    }

    public function show(Conversation $conversation)
    {
        $conversation->load([
            'messages.sender',
            'property',
            'tenant',
            'landlord'
        ]);

        return view('messages.show', compact('conversation'));
    }

    public function start(Property $property)
    {
        $conversation = Conversation::firstOrCreate(

            [
                'property_id' => $property->id,
                'tenant_id' => Auth::id(),
                'landlord_id' => $property->user_id,
            ]

        );

        return redirect()->route('messages.show', $conversation);
    }

    public function store(Request $request, Conversation $conversation)
    {
        $request->validate([

            'message' => 'required|string'

        ]);

        $message = Message::create([

            'conversation_id' => $conversation->id,

            'sender_id' => Auth::id(),

            'message' => $request->message

        ]);

        broadcast(new MessageSent($message))->toOthers();

        return back();
    }
}