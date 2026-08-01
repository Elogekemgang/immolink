@extends('layouts.app')

@section('content')


<div class="container mx-auto px-6 py-8">

<div class="bg-white rounded-xl shadow p-8">

<h1 class="text-3xl font-bold mb-6">

Litige #{{ $dispute->id }}

</h1>

<p>

<strong>Bien :</strong>

{{ $dispute->contract->property->title }}

</p>

<p class="mt-4">

<strong>Bailleur :</strong>

{{ $dispute->contract->landlord->name }}

</p>

<p class="mt-4">

<strong>Locataire :</strong>

{{ $dispute->contract->tenant->name }}

</p>

<p class="mt-4">

<strong>Objet :</strong>

{{ $dispute->title }}

</p>

<p class="mt-4">

<strong>Description :</strong>

</p>

<div class="border rounded-lg p-4 mt-2">

{{ $dispute->description }}

</div>

@if($dispute->bailiff_status=='pending')

<div class="flex gap-4 mt-8">

<form method="POST"
action="{{ route('bailiff.disputes.accept',$dispute) }}">

@csrf

@method('PATCH')

<button
class="bg-green-600 text-white px-6 py-3 rounded">

Accepter

</button>

</form>

<form method="POST"
action="{{ route('bailiff.disputes.decline',$dispute) }}">

@csrf

@method('PATCH')

<button
class="bg-red-600 text-white px-6 py-3 rounded">

Refuser

</button>

</form>

</div>

@endif

@if($dispute->bailiff_status=='accepted')

<a
href="{{ route('bailiff-reports.create',$dispute) }}"
class="bg-blue-600 text-white px-6 py-3 rounded inline-block mt-8">

Rédiger le rapport

</a>

@endif

</div>

</div>


@endsection