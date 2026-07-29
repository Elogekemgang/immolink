@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-10">

    <div class="bg-white rounded-xl shadow-lg p-8">

        <h1 class="text-3xl font-bold mb-2">

            Demande de location

        </h1>

        <p class="text-gray-500 mb-8">

            {{ $property->title }}

        </p>

        <form
            action="{{ route('tenant.rental-requests.store',$property) }}"
            method="POST">

            @csrf

            <div>

                <label class="block mb-3 font-semibold">

                    Message au bailleur

                </label>

                <textarea
                    name="message"
                    rows="8"
                    class="w-full border rounded-lg p-4"
                    placeholder="Bonjour, je suis intéressé par votre logement..."></textarea>

            </div>

            <div class="mt-8 flex justify-end">

                <button
                    class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-lg">

                    Envoyer la demande

                </button>

            </div>

        </form>

    </div>

</div>

@endsection