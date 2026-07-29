@extends('layouts.app')

@section('title','Mes contrats')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold">

            Mes contrats

        </h1>

    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="p-4 text-left">

                    Bien

                </th>

                <th>

                    Bailleur

                </th>

                <th>

                    Locataire

                </th>

                <th>

                    Loyer

                </th>

                <th>

                    Statut

                </th>

                <th>

                    Action

                </th>

            </tr>

            </thead>

            <tbody>

            @forelse($contracts as $contract)

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

                    {{ number_format($contract->monthly_rent,0,',',' ') }}

                    FCFA

                </td>

                <td>

                    {{ ucfirst(str_replace('_',' ',$contract->status)) }}

                </td>

                <td>

                    <a
                        href="{{ route('contracts.show',$contract) }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded">

                        Ouvrir

                    </a>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="text-center py-10">

                    Aucun contrat disponible.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection