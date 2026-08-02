<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<style>

body{

font-family: DejaVu Sans;

font-size:13px;

color:#2c3e50;

line-height:1.6;

margin:30px;

}

.header{

border-bottom:4px solid #2563eb;

padding-bottom:15px;

margin-bottom:25px;

}

.logo{

font-size:30px;

font-weight:bold;

color:#2563eb;

}

.subtitle{

font-size:15px;

color:#555;

}

.title{

text-align:center;

font-size:26px;

font-weight:bold;

margin:25px 0;

text-transform:uppercase;

color:#1e3a8a;

}

.section{

margin-top:25px;

}

.section-title{

background:#2563eb;

color:white;

padding:8px;

font-size:16px;

font-weight:bold;

}

table{

width:100%;

border-collapse:collapse;

margin-top:10px;

}

td{

border:1px solid #d1d5db;

padding:10px;

}

.label{

font-weight:bold;

width:35%;

background:#f5f5f5;

}

.clause{

border:1px solid #ddd;

padding:15px;

margin-top:8px;

background:#fafafa;

text-align:justify;

}

.signature{

margin-top:70px;

width:100%;

}

.signature td{

border:none;

text-align:center;

}

.footer{

position:fixed;

bottom:0;

left:0;

right:0;

font-size:10px;

text-align:center;

color:#777;

border-top:1px solid #ddd;

padding-top:8px;

}

.badge{

display:inline-block;

padding:6px 12px;

background:#16a34a;

color:white;

font-size:12px;

border-radius:20px;

}

.watermark{

position:fixed;

top:45%;

left:18%;

font-size:90px;

color:#000;

opacity:.04;

transform:rotate(-30deg);

}

</style>

</head>

<body>

<div class="watermark">

IMMOLINK

</div>

<div class="header">

<div class="logo">

🏠 IMMOLINK

</div>

<div class="subtitle">

Plateforme intelligente de gestion immobilière

</div>

</div>

<div class="title">

CONTRAT DE BAIL D'HABITATION

</div>

<div style="text-align:right">

<span class="badge">

Contrat #{{ $leaseContract->id }}

</span>

</div>

<div class="section">

<div class="section-title">

Informations générales

</div>

<table>

<tr>

<td class="label">

Date de création

</td>

<td>

{{ $leaseContract->created_at->format('d/m/Y') }}

</td>

</tr>

<tr>

<td class="label">

Date de début

</td>

<td>

{{ $leaseContract->start_date }}

</td>

</tr>

<tr>

<td class="label">

Date de fin

</td>

<td>

{{ $leaseContract->end_date ?? "Durée indéterminée" }}

</td>

</tr>

<tr>

<td class="label">

Statut

</td>

<td>

{{ strtoupper($leaseContract->status) }}

</td>

</tr>

</table>

</div>

<div class="section">

<div class="section-title">

Le Bailleur

</div>

<table>

<tr>

<td class="label">

Nom

</td>

<td>

{{ $leaseContract->landlord->name }}

</td>

</tr>

<tr>

<td class="label">

Email

</td>

<td>

{{ $leaseContract->landlord->email }}

</td>

</tr>

</table>

</div>

<div class="section">

<div class="section-title">

Le Locataire

</div>

<table>

<tr>

<td class="label">

Nom

</td>

<td>

{{ $leaseContract->tenant->name }}

</td>

</tr>

<tr>

<td class="label">

Email

</td>

<td>

{{ $leaseContract->tenant->email }}

</td>

</tr>

</table>

</div>

<div class="section">

<div class="section-title">

Bien immobilier

</div>

<table>

<tr>

<td class="label">

Titre

</td>

<td>

{{ $leaseContract->property->title }}

</td>

</tr>

<tr>

<td class="label">

Adresse

</td>

<td>

{{ $leaseContract->property->address }}

</td>

</tr>

<tr>

<td class="label">

Loyer

</td>

<td>

{{ number_format($leaseContract->monthly_rent,0,',',' ') }} FCFA

</td>

</tr>

<tr>

<td class="label">

Caution

</td>

<td>

{{ number_format($leaseContract->deposit,0,',',' ') }} FCFA

</td>

</tr>

</table>

</div>

<div class="section">

<div class="section-title">

Clauses du contrat

</div>

<div class="clause">

Le bailleur met à disposition du locataire le bien immobilier décrit ci-dessus.

Le locataire s'engage à utiliser le logement conformément à sa destination et à respecter les obligations prévues par la législation en vigueur.

Le paiement du loyer devra être effectué à la date convenue entre les parties.

Toute dégradation volontaire sera à la charge du locataire.

En cas de litige, les parties conviennent de recourir prioritairement à une procédure amiable via la plateforme ImmoLink avec l'assistance d'un huissier de justice avant toute action judiciaire.

</div>

</div>

<div class="section">

<div class="section-title">

Signatures électroniques

</div>

<table class="signature">

<tr>

<td>

<strong>Bailleur</strong>

<br><br><br>

@if($leaseContract->landlord_signed)

✅ Signé

<br>

{{ $leaseContract->landlord_signed_at }}

@else

Non signé

@endif

</td>

<td>

<strong>Locataire</strong>

<br><br><br>

@if($leaseContract->tenant_signed)

✅ Signé

<br>

{{ $leaseContract->tenant_signed_at }}

@else

Non signé

@endif

</td>

</tr>

</table>

</div>

<div class="footer">

Document généré automatiquement par IMMOLINK |
Contrat N° {{ $leaseContract->id }} |
Tous droits réservés © {{ date('Y') }}

</div>

</body>

</html>