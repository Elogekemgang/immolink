@extends('layouts.app')

@section('content')

<!-- ==================== -->
<!-- HERO SECTION (Ultra Moderne) -->
<!-- ==================== -->
<section class="relative min-h-screen bg-slate-900 flex items-center overflow-hidden">
    
    <!-- Arrière-plan animé flou / Cercles décoratifs -->
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?q=80&w=2000&auto=format&fit=crop')] bg-cover bg-center opacity-10"></div>
    <div class="absolute top-10 left-10 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
    <div class="absolute top-0 right-10 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-8 left-20 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-12 py-12 lg:py-0">
        <div class="grid lg:grid-cols-2 gap-16 items-center min-h-[80vh]">
            
            <!-- Texte gauche -->
            <div class="space-y-8">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm border border-white/20">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    Plateforme Immobilière Intelligente v2.0
                </div>

                <h1 class="text-5xl lg:text-7xl font-extrabold text-white leading-[1.1] tracking-tight">
                    Trouvez le logement <br> 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">idéal en toute sécurité.</span>
                </h1>

                <p class="text-lg lg:text-xl text-gray-300 max-w-lg leading-relaxed">
                    Publiez, recherchez, signez vos contrats et faites intervenir un huissier directement depuis votre canapé. L'immobilier nouvelle génération.
                </p>

                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{ route('properties.public.index') }}" class="group bg-blue-600 hover:bg-blue-500 text-white px-8 py-4 rounded-full font-semibold shadow-lg shadow-blue-500/30 transition-all duration-300 hover:scale-105 flex items-center gap-2">
                        Explorer les logements
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </a>
                    <a href="{{ route('register') }}" class="group bg-white hover:bg-gray-100 text-slate-900 px-8 py-4 rounded-full font-semibold transition-all duration-300 hover:shadow-xl">
                        Créer un compte gratuit
                    </a>
                </div>

                <div class="grid grid-cols-3 gap-8 pt-10 border-t border-white/10 max-w-md">
                    <div>
                        <h2 class="text-3xl lg:text-4xl font-bold text-white counter">500+</h2>
                        <p class="text-sm text-gray-400 uppercase tracking-wider font-semibold mt-1">Biens</p>
                    </div>
                    <div>
                        <h2 class="text-3xl lg:text-4xl font-bold text-white counter">200+</h2>
                        <p class="text-sm text-gray-400 uppercase tracking-wider font-semibold mt-1">Bailleurs</p>
                    </div>
                    <div>
                        <h2 class="text-3xl lg:text-4xl font-bold text-white counter">98%</h2>
                        <p class="text-sm text-gray-400 uppercase tracking-wider font-semibold mt-1">Satisfaction</p>
                    </div>
                </div>
            </div>

            <!-- Formulaire droite (Glassmorphism) -->
            <div class="relative">
                <div class="bg-white/5 backdrop-blur-2xl border border-white/10 rounded-3xl p-8 shadow-2xl">
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl blur opacity-20 -z-10"></div>
                    
                    <h2 class="text-2xl font-bold text-white mb-6">Trouver mon prochain logement</h2>
                    
                    <form action="{{ route('properties.public.index') }}" class="space-y-5">
                        <div>
                            <label class="text-sm text-gray-300 font-medium block mb-2">Ville ou quartier</label>
                            <input type="text" name="city" placeholder="ex: Yaoundé, Douala..." class="w-full bg-slate-800/50 border border-white/10 rounded-xl p-4 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm text-gray-300 font-medium block mb-2">Type</label>
                                <select name="type" class="w-full bg-slate-800/50 border border-white/10 rounded-xl p-4 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option>Appartement</option>
                                    <option>Studio</option>
                                    <option>Villa</option>
                                    <option>Chambre</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-sm text-gray-300 font-medium block mb-2">Budget max</label>
                                <input type="number" name="price" placeholder="FCFA" class="w-full bg-slate-800/50 border border-white/10 rounded-xl p-4 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>

                        <button class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white py-4 rounded-xl font-bold shadow-lg shadow-blue-500/30 transition-all duration-300 hover:scale-[1.02]">
                            Rechercher maintenant
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== -->
<!-- CATÉGORIES POPULAIRES -->
<!-- ==================== -->
<section class="py-20 bg-slate-50 relative">
    <!-- Décoration subtile -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-blue-100 rounded-full blur-3xl -z-10 opacity-50"></div>

    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-blue-600 font-semibold tracking-wider uppercase text-sm">Catégories</span>
            <h2 class="text-4xl font-bold mt-2">Rechercher par type de bien</h2>
        </div>

        <div class="grid md:grid-cols-4 gap-6 lg:gap-8">
            <!-- Item 1 -->
            <div class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-300 border border-transparent hover:border-blue-100 cursor-pointer flex flex-col items-center text-center transform hover:-translate-y-2">
                <div class="bg-blue-50 text-blue-600 p-4 rounded-full group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-lg font-bold mt-4">Appartements</h3>
                <p class="text-sm text-gray-500 mt-1">+250 annonces</p>
            </div>
            <!-- Item 2 -->
            <div class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-300 border border-transparent hover:border-green-100 cursor-pointer flex flex-col items-center text-center transform hover:-translate-y-2">
                <div class="bg-green-50 text-green-600 p-4 rounded-full group-hover:bg-green-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </div>
                <h3 class="text-lg font-bold mt-4">Maisons</h3>
                <p class="text-sm text-gray-500 mt-1">+120 annonces</p>
            </div>
            <!-- Item 3 -->
            <div class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-300 border border-transparent hover:border-purple-100 cursor-pointer flex flex-col items-center text-center transform hover:-translate-y-2">
                <div class="bg-purple-50 text-purple-600 p-4 rounded-full group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                </div>
                <h3 class="text-lg font-bold mt-4">Villas</h3>
                <p class="text-sm text-gray-500 mt-1">+50 annonces</p>
            </div>
            <!-- Item 4 -->
            <div class="group bg-white p-8 rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-300 border border-transparent hover:border-orange-100 cursor-pointer flex flex-col items-center text-center transform hover:-translate-y-2">
                <div class="bg-orange-50 text-orange-600 p-4 rounded-full group-hover:bg-orange-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                </div>
                <h3 class="text-lg font-bold mt-4">Studios</h3>
                <p class="text-sm text-gray-500 mt-1">+80 annonces</p>
            </div>
        </div>
    </div>
</section>

<!-- ==================== -->
<!-- DERNIÈRES ANNONCES -->
<!-- ==================== -->
<section id="properties" class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row justify-between items-center mb-12">
            <div>
                <span class="text-blue-600 font-semibold tracking-wider uppercase text-sm">Découvrez</span>
                <h2 class="text-4xl lg:text-5xl font-bold mt-2">Les dernières annonces</h2>
            </div>
            <a href="{{ route('properties.public.index') }}" class="mt-4 lg:mt-0 text-blue-600 hover:text-blue-800 font-semibold flex items-center gap-2 transition-colors duration-200">
                Voir toutes les annonces
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            @forelse($properties ?? [] as $property)
                <div class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-1 border border-gray-100">
                    <!-- Image container -->
                    <div class="relative overflow-hidden h-72">
                        <img src="{{ asset('storage/'.$property->main_image) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <!-- Badge -->
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-blue-600 shadow-sm">
                            Nouveau
                        </div>
                        <!-- Price Overlay -->
                        <div class="absolute bottom-4 left-4 bg-slate-900/80 backdrop-blur-sm text-white px-4 py-2 rounded-xl text-lg font-bold">
                            {{ number_format($property->price,0,',',' ') }} FCFA
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-slate-900 group-hover:text-blue-600 transition-colors">
                                    {{ $property->title }}
                                </h3>
                                <p class="text-sm text-gray-500 mt-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $property->city }}
                                </p>
                            </div>
                            <!-- Favoris -->
                            <button class="bg-gray-100 hover:bg-red-100 p-2 rounded-full transition-colors text-gray-400 hover:text-red-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            </button>
                        </div>

                        <div class="flex justify-between mt-6 pt-6 border-t border-gray-100 text-sm text-gray-500">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                {{ $property->bedrooms }} Chbrs
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $property->bathrooms }} SDB
                            </span>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                                {{ $property->surface }} m²
                            </span>
                        </div>

                        <a href="{{ route('properties.public.show',$property) }}" class="block mt-6 text-center bg-slate-900 hover:bg-slate-800 text-white py-3 rounded-xl font-medium transition-colors duration-200 shadow-lg shadow-slate-900/20">
                            Voir le logement
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 py-16">
                    <div class="bg-gray-50 rounded-3xl p-16 text-center border border-dashed border-gray-300">
                        <div class="text-6xl mb-4 text-gray-400">🏠</div>
                        <h3 class="text-2xl font-bold text-gray-500">Aucune annonce disponible pour le moment</h3>
                        <p class="text-gray-400 mt-2">Revenez plus tard ou contactez un bailleur.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ==================== -->
<!-- SERVICES -->
<!-- ==================== -->
<section id="services" class="py-24 bg-slate-900 text-white relative overflow-hidden">
    <!-- Flou décoratif -->
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-blue-400 font-semibold tracking-wider uppercase text-sm">Pourquoi nous choisir</span>
            <h2 class="text-4xl lg:text-5xl font-bold mt-2">ImmoLink est la solution complète</h2>
            <p class="text-gray-400 mt-4 text-lg">Une plateforme unifiée qui sécurise chaque étape de la location.</p>
        </div>

        <div class="grid lg:grid-cols-4 gap-8">
            <!-- Card 1 -->
            <div class="group bg-white/5 backdrop-blur-sm border border-white/10 p-10 rounded-3xl hover:bg-white/10 hover:scale-105 hover:shadow-2xl transition-all duration-300">
                <div class="bg-blue-500/20 w-14 h-14 rounded-2xl flex items-center justify-center text-blue-400 group-hover:bg-blue-500 group-hover:text-white transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mt-6">Logements vérifiés</h3>
                <p class="mt-3 text-gray-400 leading-relaxed text-sm">Toutes les annonces et propriétaires sont contrôlés pour garantir votre sécurité.</p>
            </div>
            <!-- Card 2 -->
            <div class="group bg-white/5 backdrop-blur-sm border border-white/10 p-10 rounded-3xl hover:bg-white/10 hover:scale-105 hover:shadow-2xl transition-all duration-300">
                <div class="bg-purple-500/20 w-14 h-14 rounded-2xl flex items-center justify-center text-purple-400 group-hover:bg-purple-500 group-hover:text-white transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mt-6">Contrat numérique</h3>
                <p class="mt-3 text-gray-400 leading-relaxed text-sm">Générez et signez le bail électroniquement en toute sécurité.</p>
            </div>
            <!-- Card 3 -->
            <div class="group bg-white/5 backdrop-blur-sm border border-white/10 p-10 rounded-3xl hover:bg-white/10 hover:scale-105 hover:shadow-2xl transition-all duration-300">
                <div class="bg-orange-500/20 w-14 h-14 rounded-2xl flex items-center justify-center text-orange-400 group-hover:bg-orange-500 group-hover:text-white transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                </div>
                <h3 class="text-xl font-bold mt-6">Huissier intégré</h3>
                <p class="mt-3 text-gray-400 leading-relaxed text-sm">Gestion des litiges professionnelle directement via la plateforme.</p>
            </div>
            <!-- Card 4 -->
            <div class="group bg-white/5 backdrop-blur-sm border border-white/10 p-10 rounded-3xl hover:bg-white/10 hover:scale-105 hover:shadow-2xl transition-all duration-300">
                <div class="bg-green-500/20 w-14 h-14 rounded-2xl flex items-center justify-center text-green-400 group-hover:bg-green-500 group-hover:text-white transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mt-6">Messagerie temps réel</h3>
                <p class="mt-3 text-gray-400 leading-relaxed text-sm">Discutez instantanément avec les bailleurs pour faciliter la prise de décision.</p>
            </div>
        </div>
    </div>
</section>

<!-- ==================== -->
<!-- FONCTIONNEMENT -->
<!-- ==================== -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-20">
            <span class="text-blue-600 font-semibold tracking-wider uppercase text-sm">Processus</span>
            <h2 class="text-4xl lg:text-5xl font-bold mt-2">Location en 4 étapes simples</h2>
        </div>

        <div class="grid lg:grid-cols-4 gap-8 relative">
            <!-- Ligne de connexion pour grands écrans -->
            <div class="hidden lg:block absolute top-12 left-0 w-full h-0.5 bg-blue-100 -z-10"></div>

            <div class="text-center relative">
                <div class="w-16 h-16 rounded-full bg-blue-600 text-white flex items-center justify-center mx-auto text-2xl font-bold shadow-lg shadow-blue-500/30 mb-6 relative z-10">
                    1
                </div>
                <h3 class="text-xl font-bold">Inscrivez-vous</h3>
                <p class="text-gray-500 mt-2 text-sm">Créez votre compte en quelques secondes.</p>
            </div>
            <div class="text-center relative">
                <div class="w-16 h-16 rounded-full bg-green-600 text-white flex items-center justify-center mx-auto text-2xl font-bold shadow-lg shadow-green-500/30 mb-6 relative z-10">
                    2
                </div>
                <h3 class="text-xl font-bold">Cherchez</h3>
                <p class="text-gray-500 mt-2 text-sm">Filtrez par ville, prix et type de bien.</p>
            </div>
            <div class="text-center relative">
                <div class="w-16 h-16 rounded-full bg-purple-600 text-white flex items-center justify-center mx-auto text-2xl font-bold shadow-lg shadow-purple-500/30 mb-6 relative z-10">
                    3
                </div>
                <h3 class="text-xl font-bold">Signez</h3>
                <p class="text-gray-500 mt-2 text-sm">Validez le contrat numériquement.</p>
            </div>
            <div class="text-center relative">
                <div class="w-16 h-16 rounded-full bg-indigo-600 text-white flex items-center justify-center mx-auto text-2xl font-bold shadow-lg shadow-indigo-500/30 mb-6 relative z-10">
                    4
                </div>
                <h3 class="text-xl font-bold">Emménagez</h3>
                <p class="text-gray-500 mt-2 text-sm">Recevez les clés et profitez du logement.</p>
            </div>
        </div>
    </div>
</section>

<!-- ==================== -->
<!-- CALL TO ACTION -->
<!-- ==================== -->
<section class="py-24 relative overflow-hidden bg-slate-900">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-purple-600/20 mix-blend-overlay"></div>
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1449824913935-59a10b8d2000?q=80&w=2000')] bg-cover bg-center opacity-5"></div>
    
    <div class="max-w-5xl mx-auto text-center relative z-10 px-6">
        <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm border border-white/10 mb-6">
            <span class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></span>
            Rejoignez la communauté
        </div>

        <h2 class="text-4xl lg:text-6xl font-extrabold text-white leading-tight">
            Prêt à trouver <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">votre futur logement ?</span>
        </h2>
        
        <p class="mt-6 text-xl text-gray-300 max-w-2xl mx-auto">
            Rejoignez les milliers d'utilisateurs qui louent en toute sécurité grâce à ImmoLink.
        </p>

        <div class="mt-10 flex flex-wrap justify-center gap-4">
            <a href="{{ route('register') }}" class="bg-white text-slate-900 px-10 py-4 rounded-full font-bold hover:bg-gray-100 transition-all duration-300 hover:shadow-2xl shadow-white/20">
                Créer un compte gratuit
            </a>
            <a href="{{ route('properties.public.index') }}" class="border border-white/20 text-white px-10 py-4 rounded-full hover:bg-white/10 transition-all duration-300">
                Explorer les logements
            </a>
        </div>
    </div>
</section>

<!-- ==================== -->
<!-- STATISTIQUES -->
<!-- ==================== -->
<section class="py-20 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x-0 md:divide-x divide-gray-200">
            <div class="px-4">
                <h2 class="text-4xl lg:text-5xl font-bold text-slate-900 counter">{{ $stats['properties'] ?? 0 }}</h2>
                <p class="mt-2 text-gray-500 font-medium uppercase text-sm tracking-wider">Logements</p>
            </div>
            <div class="px-4 border-t md:border-t-0 pt-8 md:pt-0">
                <h2 class="text-4xl lg:text-5xl font-bold text-slate-900 counter">{{ $stats['landlords'] ?? 0 }}</h2>
                <p class="mt-2 text-gray-500 font-medium uppercase text-sm tracking-wider">Bailleurs</p>
            </div>
            <div class="px-4 border-t md:border-t-0 pt-8 md:pt-0">
                <h2 class="text-4xl lg:text-5xl font-bold text-slate-900 counter">{{ $stats['tenants'] ?? 0 }}</h2>
                <p class="mt-2 text-gray-500 font-medium uppercase text-sm tracking-wider">Locataires</p>
            </div>
            <div class="px-4 border-t md:border-t-0 pt-8 md:pt-0">
                <h2 class="text-4xl lg:text-5xl font-bold text-slate-900 counter">{{ $stats['contracts'] ?? 0 }}</h2>
                <p class="mt-2 text-gray-500 font-medium uppercase text-sm tracking-wider">Contrats signés</p>
            </div>
        </div>
    </div>
</section>

<!-- ==================== -->
<!-- TÉMOIGNAGES -->
<!-- ==================== -->
<section class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-blue-600 font-semibold tracking-wider uppercase text-sm">Avis clients</span>
            <h2 class="text-4xl lg:text-5xl font-bold mt-2">Ils nous font confiance</h2>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 p-8 relative border border-gray-100">
                <div class="flex text-yellow-500 text-lg mb-4">
                    ★★★★★
                </div>
                <p class="text-gray-600 italic text-lg leading-relaxed">"Grâce à ImmoLink j'ai trouvé un appartement en moins de deux jours. Le processus est ultra fluide."</p>
                <div class="mt-6 pt-6 border-t border-gray-100 flex items-center gap-4">
                    <div class="bg-blue-100 text-blue-600 w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl">MN</div>
                    <div>
                        <div class="font-bold text-slate-900">Marie N.</div>
                        <div class="text-xs text-gray-400">Locataire</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 p-8 relative border border-gray-100">
                <div class="flex text-yellow-500 text-lg mb-4">
                    ★★★★★
                </div>
                <p class="text-gray-600 italic text-lg leading-relaxed">"Le contrat électronique m'a évité beaucoup de déplacements. Tout est sécurisé et rapide."</p>
                <div class="mt-6 pt-6 border-t border-gray-100 flex items-center gap-4">
                    <div class="bg-green-100 text-green-600 w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl">JP</div>
                    <div>
                        <div class="font-bold text-slate-900">Jean P.</div>
                        <div class="text-xs text-gray-400">Bailleur</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 p-8 relative border border-gray-100">
                <div class="flex text-yellow-500 text-lg mb-4">
                    ★★★★★
                </div>
                <p class="text-gray-600 italic text-lg leading-relaxed">"La gestion des litiges avec l'huissier intégré est vraiment professionnelle. Je recommande."</p>
                <div class="mt-6 pt-6 border-t border-gray-100 flex items-center gap-4">
                    <div class="bg-purple-100 text-purple-600 w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl">AK</div>
                    <div>
                        <div class="font-bold text-slate-900">Aline K.</div>
                        <div class="text-xs text-gray-400">Locataire</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== -->
<!-- FAQ -->
<!-- ==================== -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-blue-600 font-semibold tracking-wider uppercase text-sm">Besoin d'aide ?</span>
            <h2 class="text-4xl lg:text-5xl font-bold mt-2">Questions fréquentes</h2>
        </div>

        <div class="space-y-4">
            <details class="group border border-gray-200 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 bg-white open:bg-slate-50 open:border-blue-200 open:shadow-md">
                <summary class="font-bold text-lg cursor-pointer flex justify-between items-center list-none">
                    <span>Comment publier un logement ?</span>
                    <svg class="w-5 h-5 text-gray-500 group-open:rotate-180 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-4 text-gray-600 leading-relaxed border-t border-gray-200 pt-4">
                    Inscrivez-vous en tant que bailleur, complétez votre profil, puis depuis votre tableau de bord cliquez sur "Publier une annonce".
                </div>
            </details>

            <details class="group border border-gray-200 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 bg-white open:bg-slate-50 open:border-blue-200 open:shadow-md">
                <summary class="font-bold text-lg cursor-pointer flex justify-between items-center list-none">
                    <span>Comment signer un contrat numérique ?</span>
                    <svg class="w-5 h-5 text-gray-500 group-open:rotate-180 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-4 text-gray-600 leading-relaxed border-t border-gray-200 pt-4">
                    Une fois le logement réservé, le bailleur génère le contrat. Vous recevez une notification pour le signer électroniquement via notre plateforme sécurisée.
                </div>
            </details>

            <details class="group border border-gray-200 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 bg-white open:bg-slate-50 open:border-blue-200 open:shadow-md">
                <summary class="font-bold text-lg cursor-pointer flex justify-between items-center list-none">
                    <span>Comment ouvrir un litige avec un huissier ?</span>
                    <svg class="w-5 h-5 text-gray-500 group-open:rotate-180 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-4 text-gray-600 leading-relaxed border-t border-gray-200 pt-4">
                    Depuis la page de votre contrat actif, cliquez sur le bouton "Ouvrir un litige". Sélectionnez un huissier et décrivez votre problème. Il prendra en charge le dossier.
                </div>
            </details>

            <details class="group border border-gray-200 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 bg-white open:bg-slate-50 open:border-blue-200 open:shadow-md">
                <summary class="font-bold text-lg cursor-pointer flex justify-between items-center list-none">
                    <span>Le paiement est-il sécurisé ?</span>
                    <svg class="w-5 h-5 text-gray-500 group-open:rotate-180 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <div class="mt-4 text-gray-600 leading-relaxed border-t border-gray-200 pt-4">
                    Oui. Nos futurs paiements utilisent un système de séquestre bancaire. Les fonds ne sont libérés au propriétaire qu'à la signature du contrat.
                </div>
            </details>
        </div>
    </div>
</section>

<!-- ==================== -->
<!-- NEWSLETTER -->
<!-- ==================== -->
<section class="py-20 bg-gradient-to-br from-blue-600 to-indigo-700 relative overflow-hidden">
    <!-- Animation flou -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse animation-delay-1000"></div>

    <div class="max-w-4xl mx-auto text-center relative z-10 px-6">
        <h2 class="text-4xl lg:text-5xl font-extrabold text-white leading-tight">
            Recevez les <span class="text-blue-200">nouvelles annonces</span>
        </h2>
        <p class="mt-4 text-blue-100 text-lg max-w-2xl mx-auto">
            Soyez le premier averti lorsqu'un logement correspondant à vos critères est mis en ligne.
        </p>

        <form class="flex flex-col sm:flex-row max-w-xl mx-auto mt-10 gap-4 shadow-2xl shadow-blue-900/20 rounded-full p-2 bg-white/10 backdrop-blur-sm border border-white/20">
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-white/60">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <input type="email" placeholder="Votre adresse email" class="w-full bg-transparent border-none text-white placeholder-white/60 pl-12 pr-4 py-4 focus:outline-none focus:ring-0">
            </div>
            <button type="button" class="bg-slate-900 hover:bg-slate-800 text-white px-8 py-4 rounded-full font-bold transition-all duration-300 hover:scale-105">
                S'abonner
            </button>
        </form>
    </div>
</section>

<!-- ==================== -->
<!-- FOOTER -->
<!-- ==================== -->
<footer class="bg-slate-950 text-gray-300">
    <div class="max-w-7xl mx-auto px-6 py-20">
        <div class="grid lg:grid-cols-4 gap-12">
            <div class="col-span-1 lg:col-span-2 lg:pr-12">
                <h3 class="text-3xl font-bold text-white mb-6 flex items-center gap-2">
                    <span class="bg-blue-600 w-8 h-8 rounded-lg flex items-center justify-center text-white text-sm font-bold">I</span>
                    mmoLink
                </h3>
                <p class="leading-relaxed text-gray-400 mb-6">
                    ImmoLink connecte bailleurs et locataires grâce à une plateforme intelligente, sécurisée et tout-en-un.
                </p>
                <div class="flex gap-4 text-white">
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 hover:bg-blue-600 flex items-center justify-center transition-colors">FB</a>
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 hover:bg-blue-600 flex items-center justify-center transition-colors">TW</a>
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 hover:bg-blue-600 flex items-center justify-center transition-colors">IN</a>
                </div>
            </div>

            <div>
                <h4 class="font-bold text-white text-lg mb-6">Navigation</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="/" class="hover:text-white transition-colors">Accueil</a></li>
                    <li><a href="#properties" class="hover:text-white transition-colors">Annonces</a></li>
                    <li><a href="#services" class="hover:text-white transition-colors">Services</a></li>
                    <li><a href="/contact" class="hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-white text-lg mb-6">Support</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="#" class="hover:text-white transition-colors">Centre d'aide</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Conditions d'utilisation</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Politique de confidentialité</a></li>
                </ul>
            </div>
        </div>

        <hr class="my-12 border-slate-800">
        
        <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
            <div>© {{ date('Y') }} ImmoLink. Tous droits réservés.</div>
            <div class="mt-4 md:mt-0 flex gap-6">
                <span>contact@immolink.cm</span>
                <span>+237 6 00 00 00 00</span>
                <span>Yaoundé, Cameroun</span>
            </div>
        </div>
    </div>
</footer>

<!-- ==================== -->
<!-- CSS D'ANIMATION PERSONNALISÉ (À AJOUTER À VOTRE CSS OU DANS UN STYLE <STYLE>) -->
<!-- ==================== -->
<style>
    /* Animation des bulles floues */
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
</style>

@endsection