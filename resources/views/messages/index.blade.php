@extends('layouts.app')

@section('title','Messagerie')

@section('content')

<div class="bg-white rounded-xl shadow">

    <div class="p-6 border-b">

        <h1 class="text-2xl font-bold">

            Conversations

        </h1>

    </div>

    @forelse($conversations as $conversation)

    <a href="{{ route('messages.show',$conversation) }}"
       class="flex justify-between items-center p-5 border-b hover:bg-gray-50">

        <div>

            @role('landlord')

                <h3 class="font-bold">

                    {{ $conversation->tenant->name }}

                </h3>

            @else

                <h3 class="font-bold">

                    {{ $conversation->landlord->name }}

                </h3>

            @endrole

            <p class="text-gray-500">

                {{ $conversation->property->title }}

            </p>

        </div>

        <span>

            >

        </span>

    </a>

    @empty

    <div class="p-8 text-center">

        Aucune conversation.

    </div>

    @endforelse

</div>

@endsection