@extends('layouts.app')

@section('title', 'Détails de l\'annonce')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="bg-white rounded-xl shadow overflow-hidden">

        @if($property->images->count())

            <img src="{{ asset('storage/'.$property->images->first()->image) }}"
                 class="w-full h-96 object-cover">

        @endif

        <div class="p-8">

            <div class="flex justify-between items-center">

                <h1 class="text-3xl font-bold">

                    {{ $property->title }}

                </h1>

                <span class="text-2xl font-bold text-blue-600">

                    {{ number_format($property->price,0,',',' ') }} FCFA

                </span>

            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-8">

                <div>

                    <strong>Ville</strong>

                    <p>{{ $property->city }}</p>

                </div>

                <div>

                    <strong>Quartier</strong>

                    <p>{{ $property->district }}</p>

                </div>

                <div>

                    <strong>Type</strong>

                    <p>{{ ucfirst($property->type) }}</p>

                </div>

                <div>

                    <strong>Statut</strong>

                    <p>{{ ucfirst($property->status) }}</p>

                </div>

            </div>

            <div class="mt-8">

                <h3 class="font-bold text-xl">

                    Description

                </h3>

                <p class="mt-3">

                    {{ $property->description }}

                </p>

            </div>

            <div class="mt-8 flex gap-4">

                <a href="{{ route('landlord.properties.edit',$property) }}"
                   class="bg-yellow-500 text-white px-6 py-3 rounded-lg">

                    Modifier

                </a>

                <a href="{{ route('landlord.properties.index') }}"
                   class="bg-gray-700 text-white px-6 py-3 rounded-lg">

                    Retour

                </a>

            </div>

        </div>

    </div>

</div>

@endsection