@extends('layouts.app')

@section('content')


<div class="bg-white rounded-xl shadow p-8">

<h1 class="text-3xl font-bold mb-8">

Rapport n°{{ $report->id }}

</h1>

<p>

<strong>Bien :</strong>

{{ $report->dispute->contract->property->title }}

</p>

<hr class="my-6">

<h2 class="text-xl font-bold">

Constat

</h2>

<div class="mt-4 border rounded-lg p-5">

{{ $report->report }}

</div>

<h2 class="text-xl font-bold mt-8">

Décision

</h2>

<div class="mt-4 border rounded-lg p-5">

{{ $report->decision }}

</div>

<div class="mt-8">

<a
href="{{ route('bailiff.report.pdf',$report) }}"
class="bg-red-600 text-white px-6 py-3 rounded">

Télécharger le PDF

</a>

</div>

</div>


@endsection