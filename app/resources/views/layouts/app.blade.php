<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <title>
            {{ config('app.name') }}
            @hasSection('title')
                - @yield('title')
            @endif
        </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    </head>

    <header class="border-b bg-white">
        @include('partials.header')
    </header>

    <main class="mx-auto max-w-2xl px-4 pt-16 sm:px-6 sm:pb-24 lg:max-w-7xl lg:px-8">
        @yield('content')
    </main>
</html>
