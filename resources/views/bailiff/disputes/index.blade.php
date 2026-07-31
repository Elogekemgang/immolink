@extends('layouts.app')

@section('content')


      

<div class="container mx-auto px-6 py-8">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            Mes litiges
        </h1>

    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="p-4">Bien</th>

                <th>Demandeur</th>

                <th>Objet</th>

                <th>Statut</th>

                <th>Action</th>

            </tr>

            </thead>

            <tbody>

            @foreach($disputes as $dispute)

            <tr class="border-b">

                <td class="p-4">
                    {{ $dispute->contract->property->title }}
                </td>

                <td>
                    {{ $dispute->opener->name }}
                </td>

                <td>
                    {{ $dispute->title }}
                </td>

                <td>

                    @if($dispute->bailiff_status=='pending')

                        <span class="text-yellow-600">
                            En attente
                        </span>

                    @elseif($dispute->bailiff_status=='accepted')

                        <span class="text-green-600">
                            Accepté
                        </span>

                    @else

                        <span class="text-red-600">
                            Refusé
                        </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('bailiff.disputes.show',$dispute) }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded">

                        Ouvrir

                    </a>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>





@endsection