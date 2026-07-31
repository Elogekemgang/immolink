<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ImmoLink</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100">

<div class="flex h-screen overflow-hidden">

    {{-- Sidebar selon le rôle --}}

    @role('admin')
        @include('layouts.admin_sidebar')
    @endrole

    @role('landlord')
        @include('layouts.landlord_sidebar')
    @endrole

    @role('tenant')
        @include('layouts.tenant_sidebar')
    @endrole

    @role('bailiff')
        @include('layouts.bailiff_sidebar')
    @endrole


    <div class="flex-1 flex flex-col">

        {{-- Navbar --}}
        @include('layouts.navbar')

        {{-- Contenu principal --}}
        <main class="flex-1 overflow-y-auto p-8">

            @yield('content')

        </main>

    </div>

</div>

</body>

</html>