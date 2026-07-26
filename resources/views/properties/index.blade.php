@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">

    <div class="flex items-center justify-between mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Mes annonces
            </h1>

            <p class="text-gray-500">
                Gérez tous vos biens immobiliers
            </p>
        </div>

        <a href="{{ route('properties.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

            + Nouvelle annonce

        </a>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="p-4 text-left">Photo</th>

                <th class="text-left">Titre</th>

                <th class="text-left">Ville</th>

                <th class="text-left">Prix</th>

                <th class="text-left">Statut</th>

                <th class="text-center">Actions</th>

            </tr>

            </thead>

            <tbody>

            @forelse($properties as $property)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4">

                        @if($property->images->count())

                            <img
                                src="{{ asset('storage/'.$property->images->first()->image) }}"
                                class="w-28 h-20 rounded-lg object-cover">

                        @else

                            <img
                                src="https://placehold.co/300x200"
                                class="w-28 h-20 rounded-lg">

                        @endif

                    </td>

                    <td>

                        <div class="font-semibold">

                            {{ $property->title }}

                        </div>

                    </td>

                    <td>

                        {{ $property->city }}

                    </td>

                    <td>

                        {{ number_format($property->price,0,',',' ') }} FCFA

                    </td>

                    <td>

                        @if($property->status=="available")

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                                Disponible

                            </span>

                        @elseif($property->status=="pending")

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

                                En attente

                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                                Loué

                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="flex justify-center gap-3">

                            <a
                                href="{{ route('properties.show',$property) }}"
                                class="text-green-600">

                                Voir

                            </a>

                            <a
                                href="{{ route('properties.edit',$property) }}"
                                class="text-blue-600">

                                Modifier

                            </a>

                            <form
                                method="POST"
                                action="{{ route('properties.destroy',$property) }}">

                                @csrf

                                @method('DELETE')

                                <button
                                    onclick="return confirm('Supprimer cette annonce ?')"
                                    class="text-red-600">

                                    Supprimer

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center py-10">

                        Aucune annonce disponible.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-8">

        {{ $properties->links() }}

    </div>

</div>
@endsection