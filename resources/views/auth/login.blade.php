@extends('layouts.guest')

@section('content')

<div class="min-h-screen flex">

    <!-- Partie gauche -->
    <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">

        <img
            src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?q=80&w=1974&auto=format&fit=crop"
            class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/80 via-indigo-900/70 to-black/70"></div>

        <div class="relative z-10 flex flex-col justify-between h-full p-16 text-white">

            <div>

                <div class="flex items-center gap-4">

                    <div class="w-16 h-16 rounded-2xl bg-white flex items-center justify-center text-blue-700 text-3xl">

                        🏠

                    </div>

                    <div>

                        <h1 class="text-4xl font-extrabold">

                            ImmoLink

                        </h1>

                        <p class="text-blue-100">

                            Plateforme Immobilière Intelligente

                        </p>

                    </div>

                </div>

            </div>

            <div>

                <h2 class="text-6xl font-black leading-tight">

                    Trouvez votre logement idéal.

                </h2>

                <p class="text-xl mt-8 text-gray-200 leading-9">

                    Recherchez, louez, signez vos contrats
                    électroniquement et gérez vos litiges
                    depuis une seule plateforme.

                </p>

            </div>

            <div class="flex gap-8">

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

    <!-- Partie droite -->
    <div class="w-full lg:w-1/2 flex items-center justify-center bg-gradient-to-br from-slate-100 to-blue-50 px-8">

        <div class="w-full max-w-md">

            <div class="bg-white rounded-3xl shadow-2xl p-10">

                <div class="text-center">

                    <div class="w-20 h-20 rounded-full bg-blue-600 mx-auto flex items-center justify-center text-white text-4xl">

                        👤

                    </div>

                    <h2 class="text-4xl font-bold mt-6">

                        Connexion

                    </h2>

                    <p class="text-gray-500 mt-3">

                        Connectez-vous à votre espace ImmoLink

                    </p>

                </div>

                <x-auth-session-status
                    class="mt-6"
                    :status="session('status')" />

                <form
                    method="POST"
                    action="{{ route('login') }}"
                    class="mt-8 space-y-6">

                    @csrf

                    <div>

                        <label class="font-semibold">

                            Adresse e-mail

                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            class="w-full mt-2 rounded-xl border-gray-300 focus:border-blue-600 focus:ring-blue-600 h-14">

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2" />

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
                                autocomplete="current-password"
                                class="w-full rounded-xl border-gray-300 h-14 pr-14 focus:border-blue-600 focus:ring-blue-600">

                            <button
                                type="button"
                                id="togglePassword"
                                class="absolute right-4 top-4 text-xl">

                                👁️

                            </button>

                        </div>

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2" />

                    </div>

                    <div class="flex justify-between items-center">

                        <label class="flex items-center gap-2">

                            <input
                                type="checkbox"
                                name="remember"
                                class="rounded">

                            <span>

                                Se souvenir de moi

                            </span>

                        </label>

                        @if(Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="text-blue-600 hover:underline">

                            Mot de passe oublié ?

                        </a>

                        @endif

                    </div>

                    <button
                        class="w-full h-14 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-lg transition">

                        Se connecter

                    </button>

                </form>

                <div class="text-center mt-8">

                    Vous n'avez pas encore de compte ?

                    <a
                        href="{{ route('register') }}"
                        class="text-blue-600 font-bold">

                        Créer un compte

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection