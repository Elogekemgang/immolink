@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

    @if(session('success'))

        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white rounded-xl shadow-lg p-8">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-3xl font-bold">

                    Rapport d'Huissier

                </h1>

                <p class="text-gray-500">

                    Rapport N° {{ $bailiffReport->id }}

                </p>

            </div>

            @if($bailiffReport->status=='draft')

                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-lg">

                    Brouillon

                </span>

            @else

                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-lg">

                    Rapport soumis

                </span>

            @endif

        </div>

        <hr class="mb-8">

        <div class="grid grid-cols-2 gap-8">

            <div>

                <h2 class="font-bold text-xl mb-4">

                    Informations du bien

                </h2>

                <table class="w-full">

                    <tr>

                        <td class="font-semibold py-2">

                            Maison

                        </td>

                        <td>

                            {{ $bailiffReport->dispute->leaseContract->property->title }}

                        </td>

                    </tr>

                    <tr>

                        <td class="font-semibold py-2">

                            Adresse

                        </td>

                        <td>

                            {{ $bailiffReport->dispute->leaseContract->property->address }}

                        </td>

                    </tr>

                    <tr>

                        <td class="font-semibold py-2">

                            Loyer

                        </td>

                        <td>

                            {{ number_format($bailiffReport->dispute->leaseContract->monthly_rent,0,',',' ') }} FCFA

                        </td>

                    </tr>

                </table>

            </div>

            <div>

                <h2 class="font-bold text-xl mb-4">

                    Parties concernées

                </h2>

                <table class="w-full">

                    <tr>

                        <td class="font-semibold py-2">

                            Bailleur

                        </td>

                        <td>

                            {{ $bailiffReport->dispute->leaseContract->landlord->name }}

                        </td>

                    </tr>

                    <tr>

                        <td class="font-semibold py-2">

                            Locataire

                        </td>

                        <td>

                            {{ $bailiffReport->dispute->leaseContract->tenant->name }}

                        </td>

                    </tr>

                </table>

            </div>

        </div>

        <hr class="my-8">

        <div class="mb-8">

            <h2 class="text-2xl font-bold mb-4">

                {{ $bailiffReport->title }}

            </h2>

        </div>

        <div class="mb-8">

            <h3 class="font-bold text-lg mb-3">

                Constatations

            </h3>

            <div class="bg-gray-50 rounded-lg p-5">

                {!! nl2br(e($bailiffReport->findings)) !!}

            </div>

        </div>

        <div class="mb-8">

            <h3 class="font-bold text-lg mb-3">

                Décision

            </h3>

            <div class="bg-gray-50 rounded-lg p-5">

                {!! nl2br(e($bailiffReport->decision)) !!}

            </div>

        </div>

        <div class="mb-10">

            <h3 class="font-bold text-lg mb-3">

                Recommandations

            </h3>

            <div class="bg-gray-50 rounded-lg p-5">

                {!! nl2br(e($bailiffReport->recommendations)) !!}

            </div>

        </div>

        <div class="flex gap-4">

            <a
                href="{{ route('bailiff-reports.index') }}"
                class="bg-gray-600 text-white px-6 py-3 rounded-lg">

                Retour

            </a>

            @if($bailiffReport->status=='draft')

                <a
                    href="{{ route('bailiff-reports.edit',$bailiffReport) }}"
                    class="bg-orange-500 text-white px-6 py-3 rounded-lg">

                    Modifier

                </a>

                <form
                    action="{{ route('bailiff-reports.submit',$bailiffReport) }}"
                    method="POST">

                    @csrf

                    @method('PATCH')

                    <button
                        class="bg-green-600 text-white px-6 py-3 rounded-lg">

                        Soumettre définitivement

                    </button>

                </form>

            @endif

            <a
                href="{{ route('bailiff-reports.pdf',$bailiffReport) }}"
                class="bg-red-600 text-white px-6 py-3 rounded-lg">

                Export PDF

            </a>

        </div>

    </div>

</div>

@endsection