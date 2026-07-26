@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-8">

    <div class="bg-white rounded-xl shadow p-8">

        <h2 class="text-3xl font-bold mb-8">
            Ajouter un bien immobilier
        </h2>

<form
    action="{{ route('properties.store') }}"
    method="POST"
    enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="font-semibold">Titre</label>

                    <input
                        type="text"
                        name="title"
                        class="w-full mt-2 border rounded-lg p-3"
                        value="{{ old('title') }}"
                    >
                </div>

                <div>

                    <label class="font-semibold">
                        Type
                    </label>

                    <select
                        name="type"
                        class="w-full mt-2 border rounded-lg p-3">

                        <option value="">Choisir</option>

                        <option value="house">Maison</option>

                        <option value="apartment">Appartement</option>

                        <option value="studio">Studio</option>

                        <option value="land">Terrain</option>

                        <option value="office">Bureau</option>

                    </select>

                </div>

                <div>

                    <label>Prix mensuel</label>

                    <input
                        type="number"
                        name="price"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>

                <div>

                    <label>Caution</label>

                    <input
                        type="number"
                        name="deposit"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>

                <div>

                    <label>Chambres</label>

                    <input
                        type="number"
                        name="bedrooms"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>

                <div>

                    <label>Salons</label>

                    <input
                        type="number"
                        name="living_rooms"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>

                <div>

                    <label>Salles de bain</label>

                    <input
                        type="number"
                        name="bathrooms"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>

                <div>

                    <label>Cuisines</label>

                    <input
                        type="number"
                        name="kitchens"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>

                <div>

                    <label>Surface (m²)</label>

                    <input
                        type="number"
                        name="surface"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>

                <div>

                    <label>Ville</label>

                    <input
                        type="text"
                        name="city"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>

                <div>

                    <label>Quartier</label>

                    <input
                        type="text"
                        name="district"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>

                <div>

                    <label>Adresse</label>

                    <input
                        type="text"
                        name="address"
                        class="w-full mt-2 border rounded-lg p-3">

                </div>

            </div>

            <div class="mt-6">

                <label>Description</label>

                <textarea
                    name="description"
                    rows="6"
                    class="w-full border rounded-lg p-3"></textarea>

            </div>


            <div class="mt-6">

    <label class="block font-semibold mb-2">

        Photos du bien

    </label>

    <input
        type="file"
        name="images[]"
        multiple
        accept="image/*"
        class="w-full border rounded-lg p-3">

    <small class="text-gray-500">

        Vous pouvez sélectionner plusieurs images.

    </small>

</div>

            <div class="mt-6">

                <label>

                    <input
                        type="checkbox"
                        name="parking">

                    Parking disponible

                </label>

            </div>

            <div class="mt-8">

                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg">

                    Publier le bien

                </button>

            </div>

        </form>

    </div>

</div>

@endsection