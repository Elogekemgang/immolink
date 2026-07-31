<aside class="w-72 bg-slate-900 text-white flex flex-col min-h-screen">

    <div class="p-6 border-b border-slate-700">

        <h1 class="text-3xl font-bold">

            ImmoLink

        </h1>

        <p class="text-gray-400 mt-1">

            Espace Locataire

        </p>

    </div>

    <nav class="flex-1 py-6">

        <a href="{{ route('tenant.dashboard') }}"
           class="block px-6 py-3 hover:bg-slate-800">

            📊 Tableau de bord

        </a>

        <a href="{{ route('properties.public.index') }}"
           class="block px-6 py-3 hover:bg-slate-800">

            🔍 Rechercher un logement

        </a>

        <a href="{{ route('contracts.index') }}"
           class="block px-6 py-3 hover:bg-slate-800">

            📄 Mes contrats

        </a>

        <a href="{{ route('disputes.index') }}"
           class="block px-6 py-3 hover:bg-slate-800">

            ⚖️ Mes litiges

        </a>

        <a href="{{ route('conversations.index') }}"
           class="block px-6 py-3 hover:bg-slate-800">

            💬 Messagerie

        </a>

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