@extends('layouts.app')

@section('title','Dashboard Bailleur')

@section('content')

<div class="space-y-8">

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

<div class="bg-white rounded-xl shadow p-6">

<h3 class="text-gray-500">Annonces</h3>

<p class="text-4xl font-bold mt-3">

{{ $totalProperties }}

</p>

</div>

<div class="bg-white rounded-xl shadow p-6">

<h3 class="text-gray-500">

Disponibles

</h3>

<p class="text-4xl font-bold text-green-600 mt-3">

{{ $availableProperties }}

</p>

</div>

<div class="bg-white rounded-xl shadow p-6">

<h3 class="text-gray-500">

Louées

</h3>

<p class="text-4xl font-bold text-blue-600 mt-3">

{{ $rentedProperties }}

</p>

</div>

<div class="bg-white rounded-xl shadow p-6">

<h3 class="text-gray-500">

Demandes

</h3>

<p class="text-4xl font-bold text-yellow-600 mt-3">

{{ $pendingRequests }}

</p>

</div>

<div class="bg-white rounded-xl shadow p-6">

<h3 class="text-gray-500">

Contrats

</h3>

<p class="text-4xl font-bold text-purple-600 mt-3">

{{ $activeContracts }}

</p>

</div>

<div class="bg-white rounded-xl shadow p-6">

<h3 class="text-gray-500">

Revenus

</h3>

<p class="text-3xl font-bold text-red-600 mt-3">

{{ number_format($monthlyRevenue,0,',',' ') }}

FCFA

</p>

</div>

</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

<div class="bg-white rounded-xl shadow">

<div class="border-b p-5">

<h2 class="font-bold text-xl">

Dernières annonces

</h2>

</div>

<table class="w-full">

<thead>

<tr class="bg-gray-100">

<th class="p-4">Titre</th>

<th>Ville</th>

<th>Prix</th>

</tr>

</thead>

<tbody>

@foreach($latestProperties as $property)

<tr class="border-b">

<td class="p-4">

{{ $property->title }}

</td>

<td>

{{ $property->city }}

</td>

<td>

{{ number_format($property->price,0,',',' ') }}

FCFA

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

<div class="bg-white rounded-xl shadow">

<div class="border-b p-5">

<h2 class="font-bold text-xl">

Dernières demandes

</h2>

</div>

<table class="w-full">

<thead>

<tr class="bg-gray-100">

<th class="p-4">

Locataire

</th>

<th>

Bien

</th>

<th>

Statut

</th>

</tr>

</thead>

<tbody>

@foreach($latestRequests as $request)

<tr class="border-b">

<td class="p-4">

{{ $request->tenant->name }}

</td>

<td>

{{ $request->property->title }}

</td>

<td>

{{ ucfirst($request->status) }}

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

@endsection