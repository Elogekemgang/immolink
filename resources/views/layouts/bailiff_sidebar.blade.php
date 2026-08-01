<aside class="w-72 min-h-screen bg-slate-900 text-white flex flex-col">

    <!-- Logo -->
    <div class="p-6 border-b border-slate-700">

        <h1 class="text-2xl font-bold text-blue-400">
            ImmoLink
        </h1>

        <p class="text-sm text-gray-400 mt-1">
            Espace Huissier
        </p>

    </div>

    <!-- Informations utilisateur -->
    <div class="p-6 border-b border-slate-700">

        <div class="flex items-center gap-4">

            <div class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center text-xl font-bold">

                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

            </div>

            <div>

                <h2 class="font-semibold">

                    {{ Auth::user()->name }}

                </h2>

                <p class="text-sm text-gray-400">

                    Huissier

                </p>

            </div>

        </div>

    </div>

    <!-- Menu -->
    <nav class="flex-1 p-4">

        <ul class="space-y-2">

            <li>

                <a href="{{ route('bailiff.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition">

                    📊

                    <span>Tableau de bord</span>

                </a>

            </li>

            <li>

                <a href="{{ route('bailiff.disputes.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition">

                    ⚖️

                    <span>Mes litiges</span>

                </a>

            </li>

            <li>

                <a href="{{ route('bailiff-reports.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition">

                    📝

                    <span>Mes rapports</span>

                </a>

            </li>

            <li>

                {{-- <a href="{{ route('notifications.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition">

                    🔔

                    <span>Notifications</span>

                </a> --}}

            </li>

            <li>

                <a href="{{ route('profile.edit') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition">

                    👤

                    <span>Mon profil</span>

                </a>

            </li>

        </ul>

    </nav>

    <!-- Déconnexion -->
    <div class="p-4 border-t border-slate-700">

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button
                type="submit"
                class="w-full bg-red-600 hover:bg-red-700 transition rounded-lg py-3 font-semibold">

                Déconnexion

            </button>

        </form>

    </div>

</aside>