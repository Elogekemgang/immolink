@extends('layouts.app')

@section('content')



<div class="container mx-auto px-6 py-8">

    <h1 class="text-3xl font-bold mb-8">
        Tableau de bord Huissier
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <div class="bg-blue-600 text-white rounded-xl p-6 shadow">
            <h2 class="text-lg">Demandes reçues</h2>
            <p class="text-4xl font-bold mt-3">
                {{ $pendingCount }}
            </p>
        </div>

        <div class="bg-green-600 text-white rounded-xl p-6 shadow">
            <h2 class="text-lg">Dossiers en cours</h2>
            <p class="text-4xl font-bold mt-3">
                {{ $investigatingCount }}
            </p>
        </div>

        <div class="bg-purple-600 text-white rounded-xl p-6 shadow">
            <h2 class="text-lg">Résolus</h2>
            <p class="text-4xl font-bold mt-3">
                {{ $resolvedCount }}
            </p>
        </div>

        <div class="bg-red-600 text-white rounded-xl p-6 shadow">
            <h2 class="text-lg">Refusés</h2>
            <p class="text-4xl font-bold mt-3">
                {{ $declinedCount }}
            </p>
        </div>

    </div>

</div>


@endsection