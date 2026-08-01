<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GroqService;

class AssistantController extends Controller
{
    protected $groq;

    public function __construct(GroqService $groq)
    {
        $this->groq = $groq;
    }

    public function chat(Request $request)
    {
        $request->validate([

            'message'=>'required|string'

        ]);

        $reply = $this->groq->ask(

            $request->message,

            auth()->user()

        );

        return response()->json([

            'reply'=>$reply

        ]);
    }
}