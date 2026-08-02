<aside class="w-72 bg-slate-900 text-white flex flex-col">

    <div class="p-6 border-b border-slate-700">

        <h1 class="text-3xl font-bold">

            🏠 ImmoLink

        </h1>

        <p class="text-gray-400 mt-2">

            Administration

        </p>

    </div>

    <nav class="flex-1 py-5">

        <a href="{{ route('admin.dashboard') }}"
           class="block px-6 py-3 hover:bg-slate-800">

            📊 Tableau de bord

        </a>

        {{-- <a href="{{ route('admin.users.index') }}"
           class="block px-6 py-3 hover:bg-slate-800">

            👥 Utilisateurs

        </a>

        <a href="{{ route('admin.properties.index') }}"
           class="block px-6 py-3 hover:bg-slate-800">

            🏠 Logements

        </a>

        <a href="{{ route('admin.contracts.index') }}"
           class="block px-6 py-3 hover:bg-slate-800">

            📄 Contrats

        </a>

        <a href="{{ route('admin.disputes.index') }}"
           class="block px-6 py-3 hover:bg-slate-800">

            ⚖️ Litiges

        </a>

        <a href="{{ route('admin.bailiffs.index') }}"
           class="block px-6 py-3 hover:bg-slate-800">

            👨‍⚖️ Huissiers

        </a>

        <a href="{{ route('admin.messages.index') }}"
           class="block px-6 py-3 hover:bg-slate-800">

            💬 Messagerie

        </a>

        <a href="{{ route('admin.statistics') }}"
           class="block px-6 py-3 hover:bg-slate-800">

            📈 Statistiques

        </a> --}}

        <a href="{{ route('profile.edit') }}"
           class="block px-6 py-3 hover:bg-slate-800">

            👤 Mon profil

        </a>

    </nav>

    <div class="border-t border-slate-700 p-6">

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button class="w-full bg-red-600 hover:bg-red-700 py-3 rounded-lg">

                Déconnexion

            </button>

        </form>

    </div>

</aside>