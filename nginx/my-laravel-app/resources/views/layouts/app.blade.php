<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.theme === 'dark' || (!('theme' in localStorage))) {
            document.documentElement.classList.add('dark')
            // Whenever the user explicitly chooses dark mode
            localStorage.theme = 'dark'
        } else {
            document.documentElement.classList.add('light')
            // Whenever the user explicitly chooses dark mode
            localStorage.theme = 'light'
        }

        function toggleDarkMode() {
            // htmlタグにdarkクラスが含まれているかどうか
            if (localStorage.theme === 'dark' || (!('theme' in localStorage))) {
                localStorage.theme = 'light'
                location.reload();
            } else {
                localStorage.theme = 'dark'
                location.reload();
            }
        }
    </script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    <!-- Page Content -->
    <main class="bg-gray-100 dark:bg-gray-700">
        {{ $slot }}
    </main>
</div>
</body>
</html>
