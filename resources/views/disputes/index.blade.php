@extends('layouts.app')

@section('content')

<div class="flex">



    <main class="flex-1 p-8 bg-gray-100 min-h-screen">

        @if(session('success'))

            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">

                {{ session('success') }}

            </div>

        @endif

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-3xl font-bold">

                Mes litiges

            </h1>

        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="p-4 text-left">Bien</th>

                        <th>Objet</th>

                        <th>Huissier</th>

                        <th>Statut</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($disputes as $dispute)

                    <tr class="border-b">

                        <td class="p-4">

                            {{ $dispute->contract->property->title }}

                        </td>

                        <td>

                            {{ $dispute->title }}

                        </td>

                        <td>

                            {{ $dispute->bailiff->name }}

                        </td>

                        <td>

                            @switch($dispute->status)

                                @case('open')

                                    <span class="text-yellow-600 font-semibold">

                                        Ouvert

                                    </span>

                                @break

                                @case('investigating')

                                    <span class="text-blue-600 font-semibold">

                                        En enquête

                                    </span>

                                @break

                                @case('resolved')

                                    <span class="text-green-600 font-semibold">

                                        Résolu

                                    </span>

                                @break

                                @default

                                    <span>

                                        {{ ucfirst($dispute->status) }}

                                    </span>

                            @endswitch

                        </td>

                        <td>

                            <a

                                href="{{ route('disputes.show',$dispute) }}"

                                class="bg-blue-600 text-white px-4 py-2 rounded">

                                Voir

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center p-8">

                            Aucun litige.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </main>

</div>

@endsection