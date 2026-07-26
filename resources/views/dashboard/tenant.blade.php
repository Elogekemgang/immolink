@extends('layouts.app')

@section('title','Dashboard Locataire')

@section('content')

<div class="space-y-8">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="text-gray-500">

                Demandes envoyées

            </h3>

            <p class="text-4xl font-bold mt-3">

                {{ $totalRequests }}

            </p>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="text-gray-500">

                Demandes acceptées

            </h3>

            <p class="text-4xl font-bold text-green-600 mt-3">

                {{ $acceptedRequests }}

            </p>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="text-gray-500">

                Contrats actifs

            </h3>

            <p class="text-4xl font-bold text-blue-600 mt-3">

                {{ $activeContracts }}

            </p>

        </div>

    </div>

    <div class="bg-white rounded-xl shadow">

        <div class="border-b p-5">

            <h2 class="font-bold text-xl">

                Mes dernières demandes

            </h2>

        </div>

        <table class="w-full">

            <thead>

                <tr class="bg-gray-100">

                    <th class="p-4 text-left">

                        Bien

                    </th>

                    <th>

                        Statut

                    </th>

                    <th>

                        Date

                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($latestRequests as $request)

                    <tr class="border-b">

                        <td class="p-4">

                            {{ $request->property->title }}

                        </td>

                        <td>

                            @if($request->status == 'pending')

                                <span class="text-yellow-600 font-medium">

                                    En attente

                                </span>

                            @elseif($request->status == 'accepted')

                                <span class="text-green-600 font-medium">

                                    Acceptée

                                </span>

                            @else

                                <span class="text-red-600 font-medium">

                                    Refusée

                                </span>

                            @endif

                        </td>

                        <td>

                            {{ $request->created_at->format('d/m/Y') }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="3" class="text-center py-8 text-gray-500">

                            Aucune demande envoyée.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div>

        <div class="flex items-center justify-between mb-6">

            <h2 class="text-2xl font-bold">

                Dernières annonces disponibles

            </h2>

            <a href="{{ route('properties.public.index') }}"
               class="text-blue-600 font-medium">

                Voir tout

            </a>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            @foreach($availableProperties as $property)

                <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">

                    @if($property->mainImage)

                        <img
                            src="{{ asset('storage/'.$property->mainImage->image) }}"
                            class="w-full h-48 object-cover">

                    @else

                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">

                            Aucune image

                        </div>

                    @endif

                    <div class="p-5">

                        <h3 class="font-bold text-lg">

                            {{ $property->title }}

                        </h3>

                        <p class="text-gray-500 mt-1">

                            {{ $property->city }} • {{ $property->district }}

                        </p>

                        <p class="text-blue-600 font-bold text-xl mt-4">

                            {{ number_format($property->price,0,',',' ') }} FCFA

                        </p>

                        <a href="{{ route('properties.public.show',$property) }}"
                           class="block mt-5 bg-blue-600 hover:bg-blue-700 text-white text-center py-2 rounded-lg">

                            Voir les détails

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection