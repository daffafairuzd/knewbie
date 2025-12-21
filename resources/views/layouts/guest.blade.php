<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name', 'KNewbie') }}</title>

        <link href="{{ asset('css/output.css') }}" rel="stylesheet">

        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet"
        />

        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    </head>
    <body class="font-['Poppins'] bg-gray-50 text-gray-900">

        <x-nav-guest />

        <main class="min-h-[calc(100vh-80px)] flex items-center justify-center py-10 px-4">
            <div class="w-full max-w-md">
                {{ $slot }}
            </div>
        </main>

    </body>
</html>
