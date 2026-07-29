@extends('layouts.app')

@section('title','Discussion')

@section('content')

<div class="bg-white rounded-xl shadow">

    <div class="border-b p-5">

        <h2 class="font-bold text-xl">

            {{ $conversation->property->title }}

        </h2>

    </div>

    <div class="h-[500px] overflow-y-auto p-6 space-y-4">

        @foreach($conversation->messages as $message)

            <div class="@if($message->sender_id==auth()->id()) text-right @endif">

                <div class="inline-block bg-blue-100 rounded-xl px-4 py-3">

                    <strong>

                        {{ $message->sender->name }}

                    </strong>

                    <br>

                    {{ $message->message }}

                </div>

            </div>

        @endforeach

    </div>

    <form
        action="{{ route('messages.store',$conversation) }}"
        method="POST"
        class="border-t p-5 flex gap-3">

        @csrf

        <input
            type="text"
            name="message"
            class="flex-1 border rounded-lg p-3"
            placeholder="Votre message...">

        <button
            class="bg-blue-600 text-white px-6 rounded-lg">

            Envoyer

        </button>

    </form>

</div>

@endsection