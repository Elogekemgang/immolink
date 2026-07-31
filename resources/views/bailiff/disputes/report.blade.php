@extends('layouts.app')

@section('content')



<div class="container mx-auto px-6 py-8">

<div class="bg-white rounded-xl shadow p-8">

<h1 class="text-3xl font-bold mb-8">

Rapport d'intervention

</h1>

<form
action="{{ route('bailiff.report.store',$dispute) }}"
method="POST">

@csrf

<div class="mb-6">

<label class="font-bold">

Constat

</label>

<textarea
name="report"
rows="8"
class="w-full border rounded-lg p-4 mt-2"></textarea>

</div>

<div class="mb-6">

<label class="font-bold">

Décision

</label>

<textarea
name="decision"
rows="6"
class="w-full border rounded-lg p-4 mt-2"></textarea>

</div>

<div class="mb-6">

<label class="font-bold">

Date d'intervention

</label>

<input
type="date"
name="intervention_date"
class="border rounded-lg p-3 w-full">

</div>

<button
class="bg-green-600 text-white px-8 py-3 rounded">

Enregistrer le rapport

</button>

</form>

</div>

</div>






@endsection