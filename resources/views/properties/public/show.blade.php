@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-8">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        <div>

            @if($property->mainImage)

                <img
                    src="{{ asset('storage/'.$property->mainImage->image) }}"
                    class="w-full rounded-xl">

            @endif

        </div>

        <div>

            <h1 class="text-4xl font-bold">

                {{ $property->title }}

            </h1>

            <h2 class="text-blue-600 text-3xl font-bold mt-4">

                {{ number_format($property->price,0,',',' ') }} FCFA / mois

            </h2>

            <div class="mt-6 space-y-3">

                <p><strong>Ville :</strong> {{ $property->city }}</p>

                <p><strong>Quartier :</strong> {{ $property->district }}</p>

                <p><strong>Adresse :</strong> {{ $property->address }}</p>

                <p><strong>Type :</strong> {{ ucfirst($property->type) }}</p>

                <p><strong>Chambres :</strong> {{ $property->bedrooms }}</p>

                <p><strong>Salons :</strong> {{ $property->living_rooms }}</p>

                <p><strong>Salles de bain :</strong> {{ $property->bathrooms }}</p>

                <p><strong>Cuisines :</strong> {{ $property->kitchens }}</p>

            </div>

            <div class="mt-8">

                <h3 class="font-bold text-xl">

                    Description

                </h3>

                <p class="mt-3">

                    {{ $property->description }}

                </p>

            </div>

            <div class="mt-10">

                @auth

                    @role('tenant')

                        <a
                            href="{{ route('rental-requests.create',$property) }}"
                            class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-lg">

                            Demander cette location

                        </a>

                    @endrole

                @else

                    <a
                        href="{{ route('login') }}"
                        class="bg-blue-600 text-white px-8 py-4 rounded-lg">

                        Connectez-vous pour louer

                    </a>

                @endauth

            </div>

        </div>

    </div>

</div>

@endsection