<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $profile['name'] ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-200 font-sans antialiased">
    <div class="relative min-h-screen overflow-hidden">
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_center,_rgba(15,118,110,0.12),_transparent_65%)]"></div>

        @include('home.sections.header', [
            'profile' => $profile,
        ])

        <main>
            @include('home.sections.hero', ['profile' => $profile])
            @include('home.sections.about', ['profile' => $profile])
            @include('home.sections.skills', ['skills' => $skills])
            @include('home.sections.projects', ['projects' => $projects])
            @include('home.sections.contact', ['profile' => $profile])
        </main>

        @include('home.sections.footer', [
            'profile' => $profile,
        ])
    </div>
</body>
</html>
