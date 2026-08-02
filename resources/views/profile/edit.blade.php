@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <h1 class="text-3xl font-bold mb-8">

            👤 Mon profil

        </h1>

        @if(session('status')=='profile-updated')

            <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg mb-8">

                Profil mis à jour avec succès.

            </div>

        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            {{-- Informations personnelles --}}
            <div>

                <h2 class="text-xl font-bold mb-6">

                    Informations personnelles

                </h2>

                @include('profile.partials.update-profile-information-form')

            </div>

            {{-- Mot de passe --}}
            <div>

                <h2 class="text-xl font-bold mb-6">

                    Sécurité

                </h2>

                @include('profile.partials.update-password-form')

            </div>

        </div>

        <div class="mt-12">

            <h2 class="text-xl font-bold text-red-600 mb-6">

                Zone dangereuse

            </h2>

            @include('profile.partials.delete-user-form')

        </div>

    </div>

</div>

@endsection