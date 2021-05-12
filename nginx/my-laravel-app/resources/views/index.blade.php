<x-app-layout>
    <header>
        <nav class="bg-white dark:bg-gray-800">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home') }}">
                                <x-application-logo
                                    class="block h-10 w-auto fill-current text-gray-900 dark:text-white"/>
                            </a>
                        </div>
                        <!-- Title -->
                        <a class="navbar-brand flex items-center pl-2 text-gray-900 dark:text-white"
                           href="{{ route('home') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>

                    <div class="flex float-right items-center px-2">
                        @if (Route::has('login'))

                            <div class="sm:block text-gray-900 dark:text-white">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-sm">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                           class="ml-4 text-sm">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif

                        <div class="px-4">
                            <button onclick="toggleDarkMode()"
                                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                テーマ切り替え
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-lg bg-white dark:bg-gray-800 rounded-lg m-3 p-2">
                <h1 class="text-4xl text-gray-900 dark:text-white">最新のチャット</h1>
            </div>

            <div class="shadow-lg bg-white dark:bg-gray-800 rounded-lg m-3 p-2">
                <h2 class="text-2xl text-gray-900 dark:text-white">新規投稿！</h2>
                <a href="#"><h2 class="text-xl text-gray-400 dark:text-white hover:text-gray-600 dark:hover:text-gray-400">@test</h2></a>
                <p class="text-base text-gray-900 dark:text-white">新しいことはじめました！！</p>
            </div>

        </div>
    </div>
</x-app-layout>
