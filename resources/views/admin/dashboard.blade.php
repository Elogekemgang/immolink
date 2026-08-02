@extends('layouts.app')

@section('content')

<div class="space-y-8">

    <!-- En-tête -->
    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-4xl font-bold text-slate-800">

                Tableau de bord Administrateur

            </h1>

            <p class="text-gray-500 mt-2">

                Bienvenue sur le centre de supervision d'ImmoLink.

            </p>

        </div>

        <div>

            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">

                ● Système opérationnel

            </span>

        </div>

    </div>

    <!-- Statistiques -->

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500">

                Utilisateurs

            </p>

            <h2 class="text-4xl font-bold mt-3">

                {{ $users }}

            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500">

                Logements

            </p>

            <h2 class="text-4xl font-bold mt-3">

                {{ $properties }}

            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500">

                Contrats

            </p>

            <h2 class="text-4xl font-bold mt-3">

                {{ $contracts }}

            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500">

                Litiges

            </p>

            <h2 class="text-4xl font-bold mt-3 text-red-600">

                {{ $disputes }}

            </h2>

        </div>

    </div>

    <!-- Deuxième ligne -->

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500">

                Bailleurs

            </p>

            <h2 class="text-4xl font-bold mt-3">

                {{ $landlords }}

            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500">

                Locataires

            </p>

            <h2 class="text-4xl font-bold mt-3">

                {{ $tenants }}

            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500">

                Huissiers

            </p>

            <h2 class="text-4xl font-bold mt-3">

                {{ $bailiffs }}

            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500">

                Contrats actifs

            </p>

            <h2 class="text-4xl font-bold mt-3 text-green-600">

                {{ $activeContracts }}

            </h2>

        </div>

    </div>

    <!-- Activité -->

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <div class="bg-white rounded-2xl shadow-lg">

            <div class="border-b p-6">

                <h2 class="text-xl font-bold">

                    Nouveaux utilisateurs

                </h2>

            </div>

            <table class="w-full">

                <thead>

                <tr class="bg-gray-100">

                    <th class="p-4 text-left">

                        Nom

                    </th>

                    <th>

                        Email

                    </th>

                </tr>

                </thead>

                <tbody>

                @foreach($latestUsers as $user)

                <tr class="border-b">

                    <td class="p-4">

                        {{ $user->name }}

                    </td>

                    <td>

                        {{ $user->email }}

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

        <div class="bg-white rounded-2xl shadow-lg">

            <div class="border-b p-6">

                <h2 class="text-xl font-bold">

                    Derniers logements

                </h2>

            </div>

            <table class="w-full">

                <thead>

                <tr class="bg-gray-100">

                    <th class="p-4 text-left">

                        Titre

                    </th>

                    <th>

                        Prix

                    </th>

                </tr>

                </thead>

                <tbody>

                @foreach($latestProperties as $property)

                <tr class="border-b">

                    <td class="p-4">

                        {{ $property->title }}

                    </td>

                    <td>

                        {{ number_format($property->price,0,',',' ') }} FCFA

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <!-- Derniers contrats -->

    <div class="bg-white rounded-2xl shadow-lg">

        <div class="border-b p-6">

            <h2 class="text-xl font-bold">

                Derniers contrats

            </h2>

        </div>

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="p-4">

                    Bien

                </th>

                <th>

                    Bailleur

                </th>

                <th>

                    Locataire

                </th>

                <th>

                    Statut

                </th>

            </tr>

            </thead>

            <tbody>

            @foreach($latestContracts as $contract)

            <tr class="border-b">

                <td class="p-4">

                    {{ $contract->property->title }}

                </td>

                <td>

                    {{ $contract->landlord->name }}

                </td>

                <td>

                    {{ $contract->tenant->name }}

                </td>

                <td>

                    {{ ucfirst($contract->status) }}

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection