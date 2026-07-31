@extends('layouts.app')

@section('content')

<div class="flex">


    <main class="flex-1 bg-gray-100 p-8">

        <div class="flex justify-between items-center mb-8">

            <h1 class="text-3xl font-bold">
                Mes rapports
            </h1>

        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100">

                <tr>

                    <th class="p-4 text-left">N°</th>

                    <th>Bien</th>

                    <th>Date</th>

                    <th>Décision</th>

                    <th>PDF</th>

                </tr>

                </thead>

                <tbody>

                @forelse($reports as $report)

                    <tr class="border-b">

                        <td class="p-4">
                            #{{ $report->id }}
                        </td>

                        <td>
                            {{ $report->dispute->contract->property->title }}
                        </td>

                        <td>
                            {{ $report->intervention_date }}
                        </td>

                        <td>
                            {{ Str::limit($report->decision,40) }}
                        </td>

                        <td>

                            <a href="{{ route('bailiff.report.pdf',$report) }}"
                               class="bg-red-600 text-white px-4 py-2 rounded">

                                PDF

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center p-8">

                            Aucun rapport disponible.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </main>

</div>

@endsection