@extends('layouts.app')

@section('content')



<div class="bg-white rounded-xl shadow p-8">

<h1 class="text-3xl font-bold mb-8">

Litige #{{ $dispute->id }}

</h1>

<div class="grid grid-cols-2 gap-6">

<div>

<strong>Bien</strong>

<p>

{{ $dispute->contract->property->title }}

</p>

</div>

<div>

<strong>Huissier</strong>

<p>

{{ $dispute->bailiff->name }}

</p>

</div>

<div>

<strong>Objet</strong>

<p>

{{ $dispute->title }}

</p>

</div>

<div>

<strong>Statut</strong>

<p>

{{ ucfirst($dispute->status) }}

</p>

</div>

</div>

<div class="mt-8">

<strong>Description</strong>

<div class="border rounded-lg p-5 mt-3">

{{ $dispute->description }}

</div>

</div>

@if($dispute->bailiff_status=='pending')

<div class="mt-8 bg-yellow-100 p-4 rounded">

L'huissier n'a pas encore accepté cette mission.

</div>

@endif

@if($dispute->bailiff_status=='accepted')

<div class="mt-8 bg-green-100 p-4 rounded">

Mission acceptée par l'huissier.

</div>

@endif

@if($dispute->bailiff_status=='declined')

<div class="mt-8 bg-red-100 p-4 rounded">

Mission refusée.

</div>

@endif

<div class="flex flex-wrap gap-4 mt-10">

    <a href="{{ route('disputes.index') }}"
       class="bg-gray-700 text-white px-6 py-3 rounded">

        Retour

    </a>

    @if($dispute->status == 'open')

        <a href="{{ route('disputes.edit',$dispute) }}"
           class="bg-blue-600 text-white px-6 py-3 rounded">

            Modifier

        </a>

        <form action="{{ route('disputes.destroy',$dispute) }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button
                class="bg-red-600 text-white px-6 py-3 rounded">

                Supprimer

            </button>

        </form>

    @endif

    @if($dispute->status == 'resolved' && $dispute->report)

        <a href="{{ route('bailiff-reports.pdf',$dispute->report) }}"
           class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded">

            📄 Télécharger le rapport PDF

        </a>

    @endif

</div>

</div>


@endsection