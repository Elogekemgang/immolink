@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    @if(session('success'))

        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">

            {{ session('success') }}

        </div>

    @endif

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold">

                Mes rapports

            </h1>

            <p class="text-gray-500">

                Tous les rapports rédigés par l'huissier.

            </p>

        </div>

    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-800 text-white">

                <tr>

                    <th class="p-4 text-left">#</th>

                    <th class="p-4 text-left">Bien</th>

                    <th class="p-4 text-left">Titre</th>

                    <th class="p-4 text-left">Statut</th>

                    <th class="p-4 text-left">Date</th>

                    <th class="p-4 text-center">Actions</th>

                </tr>

            </thead>

            <tbody>

            @forelse($reports as $report)

                <tr class="border-b">

                    <td class="p-4">

                        {{ $report->id }}

                    </td>

                    <td class="p-4">

                        {{ $report->dispute->leaseContract->property->title }}

                    </td>

                    <td class="p-4">

                        {{ $report->title }}

                    </td>

                    <td class="p-4">

                        @if($report->status=='draft')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded">

                                Brouillon

                            </span>

                        @else

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded">

                                Soumis

                            </span>

                        @endif

                    </td>

                    <td class="p-4">

                        {{ $report->created_at->format('d/m/Y') }}

                    </td>

                    <td class="p-4">

                        <div class="flex gap-2 justify-center">

                            <a href="{{ route('bailiff-reports.show',$report) }}"
                               class="bg-blue-600 text-white px-4 py-2 rounded">

                                Voir

                            </a>

                            <a href="{{ route('bailiff-reports.edit',$report) }}"
                               class="bg-orange-500 text-white px-4 py-2 rounded">

                                Modifier

                            </a>

                            <a href="{{ route('bailiff-reports.pdf',$report) }}"
                               class="bg-red-600 text-white px-4 py-2 rounded">

                                PDF

                            </a>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center py-8 text-gray-500">

                        Aucun rapport disponible.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-6">

        {{ $reports->links() }}

    </div>

</div>

@endsection