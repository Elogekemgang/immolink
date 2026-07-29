@extends('layouts.app')

@section('title', 'Contrat de bail')

@section('content')

    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-xl shadow p-8">

            <div class="flex justify-between">

                <h1 class="text-3xl font-bold">

                    Contrat de Bail

                </h1>

                <span class="px-4 py-2 rounded bg-blue-100 text-blue-700">

                    {{ ucfirst(str_replace('_', ' ', $leaseContract->status)) }}

                </span>

            </div>

            <hr class="my-8">

            <div class="grid md:grid-cols-2 gap-8">

                <div>

                    <h2 class="font-bold text-xl mb-4">

                        Bailleur

                    </h2>

                    <p>{{ $leaseContract->landlord->name }}</p>

                    <p>{{ $leaseContract->landlord->email }}</p>

                </div>

                <div>

                    <h2 class="font-bold text-xl mb-4">

                        Locataire

                    </h2>

                    <p>{{ $leaseContract->tenant->name }}</p>

                    <p>{{ $leaseContract->tenant->email }}</p>

                </div>

            </div>

            <hr class="my-8">

            <h2 class="font-bold text-xl">

                Bien immobilier

            </h2>

            <div class="mt-4">

                <p>

                    <strong>Titre :</strong>

                    {{ $leaseContract->property->title }}

                </p>

                <p>

                    <strong>Adresse :</strong>

                    {{ $leaseContract->property->city }}

                    -

                    {{ $leaseContract->property->district }}

                </p>

                <p>

                    <strong>Loyer :</strong>

                    {{ number_format($leaseContract->monthly_rent, 0, ',', ' ') }}

                    FCFA

                </p>

                <p>

                    <strong>Caution :</strong>

                    {{ number_format($leaseContract->deposit, 0, ',', ' ') }}

                    FCFA

                </p>

                <p>

                    <strong>Date début :</strong>

                    {{ $leaseContract->start_date }}

                </p>

                <p>

                    <strong>Date fin :</strong>

                    {{ $leaseContract->end_date ?? 'Non définie' }}

                </p>

            </div>

            <hr class="my-8">

            <h2 class="text-xl font-bold mb-6">

                Signatures

            </h2>

            <div class="grid grid-cols-2 gap-8">

                <div>

                    <strong>Bailleur</strong>

                    @if ($leaseContract->landlord_signed)
                        <p class="text-green-600 mt-2">

                            ✅ Signé le

                            {{ $leaseContract->landlord_signed_at }}

                        </p>
                    @else
                        <p class="text-red-600 mt-2">

                            ❌ Non signé

                        </p>
                    @endif

                </div>

                <div>

                    <strong>Locataire</strong>

                    @if ($leaseContract->tenant_signed)
                        <p class="text-green-600 mt-2">

                            ✅ Signé le

                            {{ $leaseContract->tenant_signed_at }}

                        </p>
                    @else
                        <p class="text-red-600 mt-2">

                            ❌ Non signé

                        </p>
                    @endif

                </div>

            </div>

            <div class="mt-10 flex gap-4">

                <a href="{{ route('contracts.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded">

                    Retour

                </a>

                <form action="{{ route('contracts.sign', $leaseContract) }}" method="POST">

                    @csrf

                    @method('PATCH')

                    <button class="bg-green-600 text-white px-6 py-3 rounded">

                        Signer le contrat

                    </button>

                </form>

                <button class="bg-red-600 text-white px-6 py-3 rounded">

                    Télécharger PDF

                </button>

            </div>

        </div>

    </div>

@endsection
