@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg p-8">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-3xl font-bold">

                    Modifier le rapport

                </h1>

                <p class="text-gray-500">

                    Rapport N° {{ $bailiffReport->id }}

                </p>

            </div>

            <a href="{{ route('bailiff-reports.show',$bailiffReport) }}"
               class="bg-gray-600 text-white px-6 py-3 rounded-lg">

                Retour

            </a>

        </div>

        @if($errors->any())

            <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded-lg mb-6">

                <ul class="list-disc ml-6">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('bailiff-reports.update',$bailiffReport) }}"
              method="POST">

            @csrf

            @method('PUT')

            <div class="grid grid-cols-2 gap-6 mb-8">

                <div>

                    <label class="font-semibold">

                        Bien immobilier

                    </label>

                    <input
                        type="text"
                        disabled
                        value="{{ $bailiffReport->dispute->leaseContract->property->title }}"
                        class="w-full mt-2 border rounded-lg bg-gray-100 p-3">

                </div>

                <div>

                    <label class="font-semibold">

                        Numéro du litige

                    </label>

                    <input
                        type="text"
                        disabled
                        value="{{ $bailiffReport->dispute_id }}"
                        class="w-full mt-2 border rounded-lg bg-gray-100 p-3">

                </div>

            </div>

            <div class="mb-6">

                <label class="font-semibold">

                    Titre

                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title',$bailiffReport->title) }}"
                    class="w-full mt-2 border rounded-lg p-3"
                    required>

            </div>

            <div class="mb-6">

                <label class="font-semibold">

                    Constatations

                </label>

                <textarea
                    name="findings"
                    rows="10"
                    class="w-full mt-2 border rounded-lg p-4"
                    required>{{ old('findings',$bailiffReport->findings) }}</textarea>

            </div>

            <div class="mb-6">

                <label class="font-semibold">

                    Décision

                </label>

                <textarea
                    name="decision"
                    rows="6"
                    class="w-full mt-2 border rounded-lg p-4">{{ old('decision',$bailiffReport->decision) }}</textarea>

            </div>

            <div class="mb-8">

                <label class="font-semibold">

                    Recommandations

                </label>

                <textarea
                    name="recommendations"
                    rows="6"
                    class="w-full mt-2 border rounded-lg p-4">{{ old('recommendations',$bailiffReport->recommendations) }}</textarea>

            </div>

            <div class="flex gap-4">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg">

                    Enregistrer les modifications

                </button>

                @if($bailiffReport->status=='draft')

                    <form action="{{ route('bailiff-reports.submit',$bailiffReport) }}"
                          method="POST">

                        @csrf

                        @method('PATCH')

                        <button
                            class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg">

                            Soumettre définitivement

                        </button>

                    </form>

                @endif

            </div>

        </form>

    </div>

</div>

@endsection