<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'PT. Multi Abadi Aksana' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen bg-slate-50 text-slate-800 antialiased font-sans flex flex-col justify-between">
    <!-- Navbar Component -->
    <livewire:components.navbar />

    <!-- Main Page Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Floating WhatsApp Widget -->
    <livewire:components.floating-whats-app />

    <!-- Footer Component -->
    <livewire:components.footer />

    @livewireScripts
</body>
</html>

