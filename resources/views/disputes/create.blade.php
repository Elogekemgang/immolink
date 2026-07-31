@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-xl shadow p-8">

        <h1 class="text-3xl font-bold mb-8">
            Ouvrir un litige
        </h1>

        @if ($errors->any())

            <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-6">

                <ul class="list-disc ml-5">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('disputes.store') }}" method="POST">

            @csrf

            <input
                type="hidden"
                name="lease_contract_id"
                value="{{ $contract->id }}"
            >

            <div class="mb-6">

                <label class="block font-semibold mb-2">

                    Contrat concerné

                </label>

                <input
                    type="text"
                    disabled
                    class="w-full border rounded-lg p-3 bg-gray-100"
                    value="{{ $contract->property->title }}"
                >

            </div>

            <div class="mb-6">

                <label class="block font-semibold mb-2">

                    Objet du litige

                </label>

                <input
                    type="text"
                    name="title"
                    class="w-full border rounded-lg p-3"
                    value="{{ old('title') }}"
                    required
                >

            </div>

            <div class="mb-6">

                <label class="block font-semibold mb-2">

                    Description

                </label>

                <textarea
                    name="description"
                    rows="8"
                    class="w-full border rounded-lg p-3"
                    required>{{ old('description') }}</textarea>

            </div>

            <div class="mb-8">

                <label class="block font-semibold mb-2">

                    Choisir un huissier

                </label>

                <select
                    name="bailiff_id"
                    class="w-full border rounded-lg p-3"
                    required
                >

                    <option value="">

                        -- Sélectionner un huissier --

                    </option>

                    @foreach($bailiffs as $bailiff)

                        <option
                            value="{{ $bailiff->id }}"
                        >

                            {{ $bailiff->name }}
                            ({{ $bailiff->email }})

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="flex gap-4">

                <a
                    href="{{ route('contracts.show',$contract) }}"
                    class="bg-gray-600 text-white px-6 py-3 rounded-lg"
                >

                    Retour

                </a>

                <button
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg"
                >

                    Envoyer le litige

                </button>

            </div>

        </form>

    </div>

</div>

@endsection