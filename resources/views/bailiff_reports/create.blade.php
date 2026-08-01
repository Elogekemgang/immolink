@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg p-8">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-3xl font-bold">

                    Rédaction du rapport d'huissier

                </h1>

                <p class="text-gray-500 mt-2">

                    Litige #{{ $dispute->id }}

                </p>

            </div>

            <a href="{{ route('bailiff.disputes.show',$dispute) }}"
               class="bg-gray-600 text-white px-5 py-3 rounded-lg">

                Retour

            </a>

        </div>

        @if($errors->any())

            <div class="bg-red-100 border border-red-400 text-red-700 rounded-lg p-4 mb-6">

                <ul class="list-disc ml-6">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form method="POST"
              action="{{ route('bailiff-reports.store',$dispute) }}">

            @csrf

            <div class="grid grid-cols-2 gap-6">

                <div>

                    <label class="font-semibold">

                        Bien immobilier

                    </label>

                    <input
                        type="text"
                        disabled
                        class="w-full border rounded-lg mt-2 p-3 bg-gray-100"
                        value="{{ $dispute->leaseContract->property->title }}"
                    >

                </div>

                <div>

                    <label class="font-semibold">

                        Numéro du litige

                    </label>

                    <input
                        type="text"
                        disabled
                        class="w-full border rounded-lg mt-2 p-3 bg-gray-100"
                        value="#{{ $dispute->id }}"
                    >

                </div>

            </div>


            <div class="mt-8">

                <label class="font-semibold">

                    Titre du rapport

                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    class="w-full border rounded-lg mt-2 p-3"
                    required
                >

            </div>


            <div class="mt-8">

                <label class="font-semibold">

                    Constatations de l'huissier

                </label>

                <textarea
                    name="findings"
                    rows="10"
                    class="w-full border rounded-lg mt-2 p-4"
                    required>{{ old('findings') }}</textarea>

            </div>


            <div class="mt-8">

                <label class="font-semibold">

                    Décision

                </label>

                <textarea
                    name="decision"
                    rows="5"
                    class="w-full border rounded-lg mt-2 p-4">{{ old('decision') }}</textarea>

            </div>


            <div class="mt-8">

                <label class="font-semibold">

                    Recommandations

                </label>

                <textarea
                    name="recommendations"
                    rows="6"
                    class="w-full border rounded-lg mt-2 p-4">{{ old('recommendations') }}</textarea>

            </div>


            <div class="mt-10 flex gap-4">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg">

                    Enregistrer le rapport

                </button>

            </div>

        </form>

    </div>

</div>

@endsection