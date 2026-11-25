@props([
    'title' => null,
    'description' => null,
    'theme' => 'apple',
])

@php
    $bodyClasses = $theme === 'nasa'
        ? 'bg-space text-white'
        : 'bg-white text-apple-ink';
@endphp

<!DOCTYPE html>
<html lang="en" class="theme-{{ $theme }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('portfolio.meta.title') }}</title>
    <meta name="description" content="{{ $description ?? config('portfolio.meta.description') }}">
    @livewireStyles
    @vite(['resources/css/app.css'])
</head>
<body class="font-sans antialiased {{ $bodyClasses }}">
    {{ $slot }}
    @livewireScripts
</body>
</html>
