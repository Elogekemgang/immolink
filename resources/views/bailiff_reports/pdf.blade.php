<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<title>Rapport d'Huissier</title>

<style>

body{

    font-family: DejaVu Sans;

    font-size:13px;

    color:#222;

}

h1{

    text-align:center;

    margin-bottom:5px;

}

h2{

    background:#0f172a;

    color:white;

    padding:8px;

    font-size:16px;

}

table{

    width:100%;

    border-collapse:collapse;

    margin-bottom:20px;

}

td{

    border:1px solid #ccc;

    padding:8px;

}

.label{

    width:30%;

    font-weight:bold;

    background:#f2f2f2;

}

.section{

    border:1px solid #ccc;

    padding:15px;

    margin-bottom:20px;

    line-height:1.8;

}

.footer{

    margin-top:60px;

}

.signature{

    margin-top:60px;

    text-align:right;

}

</style>

</head>

<body>

<h1>

IMMOLINK

</h1>

<p style="text-align:center">

Rapport Officiel d'Huissier de Justice

</p>

<hr>

<h2>

Informations Générales

</h2>

<table>

<tr>

<td class="label">

N° Rapport

</td>

<td>

{{ $bailiffReport->id }}

</td>

</tr>

<tr>

<td class="label">

Date

</td>

<td>

{{ now()->format('d/m/Y') }}

</td>

</tr>

<tr>

<td class="label">

Statut

</td>

<td>

{{ strtoupper($bailiffReport->status) }}

</td>

</tr>

</table>


<h2>

Informations du Bien

</h2>

<table>

<tr>

<td class="label">

Titre

</td>

<td>

{{ $bailiffReport->dispute->leaseContract->property->title }}

</td>

</tr>

<tr>

<td class="label">

Adresse

</td>

<td>

{{ $bailiffReport->dispute->leaseContract->property->address }}

</td>

</tr>

<tr>

<td class="label">

Loyer

</td>

<td>

{{ number_format($bailiffReport->dispute->leaseContract->monthly_rent,0,',',' ') }}

FCFA

</td>

</tr>

</table>


<h2>

Parties Concernées

</h2>

<table>

<tr>

<td class="label">

Bailleur

</td>

<td>

{{ $bailiffReport->dispute->leaseContract->landlord->name }}

</td>

</tr>

<tr>

<td class="label">

Locataire

</td>

<td>

{{ $bailiffReport->dispute->leaseContract->tenant->name }}

</td>

</tr>

<tr>

<td class="label">

Huissier

</td>

<td>

{{ $bailiffReport->bailiff->name }}

</td>

</tr>

</table>


<h2>

Objet du Rapport

</h2>

<div class="section">

<strong>

{{ $bailiffReport->title }}

</strong>

</div>


<h2>

Constatations

</h2>

<div class="section">

{!! nl2br(e($bailiffReport->findings)) !!}

</div>


<h2>

Décision

</h2>

<div class="section">

{!! nl2br(e($bailiffReport->decision)) !!}

</div>


<h2>

Recommandations

</h2>

<div class="section">

{!! nl2br(e($bailiffReport->recommendations)) !!}

</div>


<div class="signature">

Fait à __________________________

<br><br>

Le {{ now()->format('d/m/Y') }}

<br><br><br>

_____________________________

<br>

Huissier de Justice

</div>


<div class="footer">

<hr>

<p style="text-align:center">

Document généré automatiquement par ImmoLink.

</p>

</div>

</body>

</html>