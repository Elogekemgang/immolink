@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-8">

    <div class="mb-8">

        <h1 class="text-4xl font-bold text-gray-800">

            Biens disponibles

        </h1>

        <p class="text-gray-500 mt-2">

            Trouvez votre prochain logement.

        </p>

    </div>

    @if($properties->count())

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($properties as $property)

                <div class="bg-white rounded-xl shadow hover:shadow-xl transition">

                    @if($property->mainImage)

                        <img
                            src="{{ asset('storage/'.$property->mainImage->image) }}"
                            class="w-full h-60 object-cover rounded-t-xl">

                    @else

                        <img
                            src="https://placehold.co/600x400"
                            class="w-full h-60 object-cover rounded-t-xl">

                    @endif

                    <div class="p-5">

                        <div class="flex justify-between items-center">

                            <h2 class="font-bold text-xl">

                                {{ $property->title }}

                            </h2>

                            <span class="text-blue-600 font-bold">

                                {{ number_format($property->price,0,',',' ') }} FCFA

                            </span>

                        </div>

                        <p class="text-gray-500 mt-3">

                            {{ $property->city }}

                            •

                            {{ $property->district }}

                        </p>

                        <div class="flex gap-4 mt-4 text-gray-600 text-sm">

                            <span>

                                🛏 {{ $property->bedrooms }}

                            </span>

                            <span>

                                🚿 {{ $property->bathrooms }}

                            </span>

                            <span>

                                🍽 {{ $property->kitchens }}

                            </span>

                        </div>

                        <div class="mt-6">

                            <a
                                href="{{ route('properties.public.show',$property) }}"
                                class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-3 rounded-lg">

                                Voir les détails

                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-white rounded-xl shadow p-12 text-center">

            <h2 class="text-2xl font-bold">

                Aucun bien disponible

            </h2>

        </div>

    @endif

    <div class="mt-10">

        {{ $properties->links() }}

    </div>

</div>

@endsection