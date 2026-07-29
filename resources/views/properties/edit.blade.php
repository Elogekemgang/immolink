@extends('layouts.app')

@section('title','Modifier une annonce')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white shadow rounded-xl p-8">

        <h1 class="text-3xl font-bold mb-8">

            Modifier une annonce

        </h1>

        <form action="{{ route('landlord.properties.update',$property) }}"
              method="POST">

            @csrf

            @method('PUT')

            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <label>Titre</label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title',$property->title) }}"
                        class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label>Prix</label>

                    <input
                        type="number"
                        name="price"
                        value="{{ old('price',$property->price) }}"
                        class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label>Ville</label>

                    <input
                        type="text"
                        name="city"
                        value="{{ old('city',$property->city) }}"
                        class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label>Quartier</label>

                    <input
                        type="text"
                        name="district"
                        value="{{ old('district',$property->district) }}"
                        class="w-full border rounded-lg p-3">

                </div>

            </div>

            <div class="mt-6">

                <label>Description</label>

                <textarea
                    name="description"
                    rows="6"
                    class="w-full border rounded-lg p-3">{{ old('description',$property->description) }}</textarea>

            </div>

            <div class="mt-8 flex gap-4">

                <button
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg">

                    Enregistrer

                </button>

                <a href="{{ route('landlord.properties.index') }}"
                   class="bg-gray-500 text-white px-8 py-3 rounded-lg">

                    Annuler

                </a>

            </div>

        </form>

    </div>

</div>

@endsection