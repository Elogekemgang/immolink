@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-8">

    <h1 class="text-3xl font-bold mb-8">

        Demandes reçues

    </h1>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-4 text-left">

                        Bien

                    </th>

                    <th>

                        Locataire

                    </th>

                    <th>

                        Message

                    </th>

                    <th>

                        Statut

                    </th>

                    <th>

                        Action

                    </th>

                </tr>

            </thead>

            <tbody>

            @forelse($requests as $request)

                <tr class="border-b">

                    <td class="p-4">

                        {{ $request->property->title }}

                    </td>

                    <td>

                        {{ $request->tenant->name }}

                    </td>

                    <td>

                        {{ $request->message }}

                    </td>

                    <td>

                        @if($request->status=="pending")

                            <span class="text-yellow-600">

                                En attente

                            </span>

                        @elseif($request->status=="accepted")

                            <span class="text-green-600">

                                Acceptée

                            </span>

                        @else

                            <span class="text-red-600">

                                Refusée

                            </span>

                        @endif

                    </td>

                    <td>

                        @if($request->status=="pending")

                        <div class="flex gap-2">

                            <form
                                method="POST"
                                action="{{ route('landlord.rental-requests.accept',$request) }}">

                                @csrf

                                @method('PATCH')

                                <button
                                    class="bg-green-600 text-white px-4 py-2 rounded">

                                    Accepter

                                </button>

                            </form>

                            <form
                                method="POST"
                                action="{{ route('landlord.rental-requests.reject',$request) }}">

                                @csrf

                                @method('PATCH')

                                <button
                                    class="bg-red-600 text-white px-4 py-2 rounded">

                                    Refuser

                                </button>

                            </form>

                        </div>

                        @else

                            -

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center py-8">

                        Aucune demande reçue.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection