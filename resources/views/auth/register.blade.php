@extends('layouts.guest')

@section('content')

<div class="min-h-screen flex">

    <!-- Partie gauche -->
    <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">

        <img
            src="https://images.unsplash.com/photo-1460317442991-0ec209397118?q=80&w=1974&auto=format&fit=crop"
            class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/90 via-blue-900/80 to-black/80"></div>

        <div class="relative z-10 flex flex-col justify-between h-full p-16 text-white">

            <div>

                <div class="flex items-center gap-4">

                    <div class="w-16 h-16 rounded-2xl bg-white flex items-center justify-center text-blue-700 text-3xl">

                        🏠

                    </div>

                    <div>

                        <h1 class="text-4xl font-black">

                            ImmoLink

                        </h1>

                        <p class="text-blue-100">

                            Votre plateforme immobilière intelligente

                        </p>

                    </div>

                </div>

            </div>

            <div>

                <h2 class="text-5xl font-extrabold leading-tight">

                    Rejoignez une nouvelle façon de louer.

                </h2>

                <p class="mt-8 text-xl leading-9 text-gray-200">

                    Publiez vos logements, trouvez votre futur
                    appartement, signez vos contrats et gérez
                    toutes vos démarches depuis une seule plateforme.

                </p>

            </div>

            <div class="grid grid-cols-3 gap-8">

                <div>

                    <h3 class="text-5xl font-bold">

                        500+

                    </h3>

                    <p>

                        Logements

                    </p>

                </div>

                <div>

                    <h3 class="text-5xl font-bold">

                        200+

                    </h3>

                    <p>

                        Bailleurs

                    </p>

                </div>

                <div>

                    <h3 class="text-5xl font-bold">

                        1500+

                    </h3>

                    <p>

                        Utilisateurs

                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- Formulaire -->
    <div class="w-full lg:w-1/2 flex items-center justify-center bg-gradient-to-br from-slate-100 to-blue-50 px-8">

        <div class="w-full max-w-lg">

            <div class="bg-white rounded-3xl shadow-2xl p-10">

                <div class="text-center">

                    <div class="w-20 h-20 rounded-full bg-blue-600 mx-auto flex items-center justify-center text-white text-4xl">

                        👤

                    </div>

                    <h2 class="text-4xl font-bold mt-6">

                        Créer un compte

                    </h2>

                    <p class="text-gray-500 mt-3">

                        Rejoignez la communauté ImmoLink

                    </p>

                </div>

                <form method="POST"
                      action="{{ route('register') }}"
                      class="space-y-6 mt-8">

                    @csrf

                    <div>

                        <label class="font-semibold">

                            Nom complet

                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            class="w-full mt-2 h-14 rounded-xl border-gray-300 focus:border-blue-600 focus:ring-blue-600">

                        <x-input-error
                            :messages="$errors->get('name')"
                            class="mt-2"/>

                    </div>

                    <div>

                        <label class="font-semibold">

                            Adresse e-mail

                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full mt-2 h-14 rounded-xl border-gray-300 focus:border-blue-600 focus:ring-blue-600">

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"/>

                    </div>

                    <div>

                        <label class="font-semibold">

                            Je suis

                        </label>

                        <select
                            name="user_type"
                            required
                            class="w-full mt-2 h-14 rounded-xl border-gray-300 focus:border-blue-600 focus:ring-blue-600">

                            <option value="">

                                Sélectionnez votre profil

                            </option>

                            <option
                                value="tenant"
                                @selected(old('user_type')=='tenant')>

                                🏠 Locataire

                            </option>

                            <option
                                value="landlord"
                                @selected(old('user_type')=='landlord')>

                                🏢 Bailleur

                            </option>

                        </select>

                        <x-input-error
                            :messages="$errors->get('user_type')"
                            class="mt-2"/>

                    </div>

                    <div>

                        <label class="font-semibold">

                            Mot de passe

                        </label>

                        <div class="relative mt-2">

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                class="w-full h-14 rounded-xl border-gray-300 pr-14 focus:border-blue-600 focus:ring-blue-600">

                            <button
                                type="button"
                                id="togglePassword"
                                class="absolute right-4 top-4 text-xl">

                                👁️

                            </button>

                        </div>

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"/>

                    </div>

                    <div>

                        <label class="font-semibold">

                            Confirmer le mot de passe

                        </label>

                        <div class="relative mt-2">

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                class="w-full h-14 rounded-xl border-gray-300 pr-14 focus:border-blue-600 focus:ring-blue-600">

                        </div>

                    </div>

                    <button
                        class="w-full h-14 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-lg font-bold transition">

                        Créer mon compte

                    </button>

                    <div class="text-center">

                        Déjà inscrit ?

                        <a href="{{ route('login') }}"
                           class="font-bold text-blue-600">

                            Se connecter

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<script>

const toggle = document.getElementById('togglePassword');

const password = document.getElementById('password');

toggle.addEventListener('click',()=>{

password.type =
password.type === 'password'
? 'text'
: 'password';

});

</script>

@endsection