@extends('layouts.app')

@section('content')



<div class="bg-white rounded-xl shadow p-8">

<h1 class="text-3xl font-bold mb-8">

Mon profil

</h1>

<div class="grid grid-cols-2 gap-8">

<div>

<label class="font-semibold">

Nom

</label>

<input
class="w-full border rounded-lg p-3 mt-2"
value="{{ auth()->user()->name }}"
readonly>

</div>

<div>

<label class="font-semibold">

Email

</label>

<input
class="w-full border rounded-lg p-3 mt-2"
value="{{ auth()->user()->email }}"
readonly>

</div>

<div>

<label class="font-semibold">

Téléphone

</label>

<input
class="w-full border rounded-lg p-3 mt-2"
value="{{ auth()->user()->phone }}">

</div>

<div>

<label class="font-semibold">

Ville

</label>

<input
class="w-full border rounded-lg p-3 mt-2"
value="{{ auth()->user()->city }}">

</div>

<div class="col-span-2">

<label class="font-semibold">

Biographie

</label>

<textarea
rows="6"
class="w-full border rounded-lg p-3 mt-2">{{ auth()->user()->bio }}</textarea>

</div>

</div>

<div class="mt-8">

<button
class="bg-blue-600 text-white px-8 py-3 rounded">

Mettre à jour

</button>

</div>

</div>



@endsection