@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-8">

        Étape 1 / 7

    </h1>

    <div class="bg-white rounded-xl shadow p-8">

        <form action="{{ route('landlord.properties.storeStep1') }}" method="POST">

            @csrf

            <div class="mb-6">

                <label class="font-semibold">

                    Titre de l'annonce

                </label>

                <input
                    type="text"
                    name="title"
                    class="w-full border rounded-lg mt-2 p-3"
                    value="{{ old('title') }}">

            </div>

            <div class="mb-8">

                <label class="font-semibold">

                    Type de bien

                </label>

                <select
                    name="type"
                    class="w-full border rounded-lg mt-2 p-3">

                    <option value="">Choisir</option>

                    <option value="house">Maison</option>

                    <option value="apartment">Appartement</option>

                    <option value="studio">Studio</option>

                    <option value="land">Terrain</option>

                    <option value="office">Bureau</option>

                </select>

            </div>

            <button
                class="bg-blue-600 text-white px-8 py-3 rounded-lg">

                Continuer →

            </button>

        </form>

    </div>

</div>

@endsection