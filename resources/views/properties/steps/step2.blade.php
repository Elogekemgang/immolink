@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-8">

        Étape 2 / 7

    </h1>

    <div class="bg-white rounded-xl shadow p-8">

        <form action="{{ route('landlord.properties.storeStep2') }}" method="POST">

            @csrf

            <div class="mb-5">

                <label>Ville</label>

                <input
                    type="text"
                    name="city"
                    class="w-full border rounded-lg mt-2 p-3">

            </div>

            <div class="mb-5">

                <label>Quartier</label>

                <input
                    type="text"
                    name="district"
                    class="w-full border rounded-lg mt-2 p-3">

            </div>

            <div class="mb-8">

                <label>Adresse</label>

                <input
                    type="text"
                    name="address"
                    class="w-full border rounded-lg mt-2 p-3">

            </div>

            <div class="flex justify-between">

                <a
                    href="{{ route('landlord.properties.step1') }}"
                    class="px-6 py-3 rounded-lg border">

                    ← Retour

                </a>

                <button
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg">

                    Continuer →

                </button>

            </div>

        </form>

    </div>

</div>

@endsection