<nav class="bg-white shadow-sm border-b h-20 flex items-center justify-between px-8">

    <!-- Partie gauche -->
    <div>

        <h2 class="text-2xl font-bold text-gray-800">
            @yield('title', 'Dashboard')
        </h2>

        <p class="text-gray-500 text-sm">
            Bienvenue sur ImmoLink
        </p>

    </div>

    <!-- Partie droite -->
    <div class="flex items-center space-x-6">

        <!-- Recherche -->
        <div class="hidden lg:block">

            <form>

                <input
                    type="text"
                    placeholder="Rechercher..."
                    class="w-80 border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

            </form>

        </div>

        <!-- Notifications -->
        <div class="relative">

            <button class="relative p-2 rounded-full hover:bg-gray-100">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6 text-gray-600"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>

                </svg>

                <span
                    class="absolute top-0 right-0 w-5 h-5 rounded-full bg-red-600 text-white text-xs flex items-center justify-center">

                    0

                </span>

            </button>

        </div>

        <!-- Profil -->
        <div class="flex items-center gap-4">

            <div>

                <h3 class="font-semibold text-gray-800">

                    @if (Auth::check())
                        {{ Auth::user()->name }}
                    @else
                        Invité
                    @endif

                </h3>

                <p class="text-sm text-gray-500">

                    @role('admin')
                        Administrateur
                    @endrole

                    @role('landlord')
                        Bailleur
                    @endrole

                    @role('tenant')
                        Locataire
                    @endrole

                    @role('bailiff')
                        Huissier
                    @endrole

                </p>

            </div>

            @auth
                <img
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=2563eb&color=ffffff"
                    alt="Avatar"
                    class="w-12 h-12 rounded-full border-2 border-blue-500">
            @else
                <img
                    src="https://ui-avatars.com/api/?name=Invité&background=2563eb&color=ffffff"
                    alt="Avatar"
                    class="w-12 h-12 rounded-full border-2 border-blue-500">
            @endauth
        </div>

    </div>

</nav>