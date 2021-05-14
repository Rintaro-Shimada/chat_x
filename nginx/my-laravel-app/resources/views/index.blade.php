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

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-lg bg-white dark:bg-gray-800 rounded-lg m-3 p-2">
                <h1 class="text-4xl text-gray-900 dark:text-white">最新のチャット</h1>
            </div>

            <div class="shadow-lg bg-white dark:bg-gray-800 rounded-lg m-3 p-2">
                @if (Route::has('login'))
                    <div class="text-gray-900 dark:text-white">
                        @auth
                            <div class="form-group">
                                @if ($errors->any())
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="font-bold">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                            <!--<form method="POST" action="{{ route('home') }}">-->
                                {{ Form::open(['url' => route('home'), 'method' => 'post']) }}
                                {{ Form::token() }}

                                {{ Form::label('tite', 'タイトル', ['class'=>'block text-sm font-medium text-gray-700']) }}
                                {{ Form::text('tite', old('title'), ['class'=>'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md', 'placeholder'=>'タイトル', 'name' =>'title','value' =>'aaa', "required"]) }}
                                <p class="mt-2 text-sm text-gray-500">
                                    32文字まで入力できます。
                                </p>

                                {{ Form::label('about', '内容', ['class'=>'block text-sm font-medium text-gray-700']) }}
                                {{ Form::textarea('about', old('text_body'), ['class'=> 'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md', 'placeholder' => '本文', 'rows' => '3', 'name' =>'text_body', "required"]) }}
                                <p class="mt-2 text-sm text-gray-500">
                                    256 文字まで入力できます。
                                </p>

                                {{ Form::submit('送信', ['class'=>'justify-center py-2 px-4 border shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) }}
                                {{ Form::close() }}
                            </div>
                        @else
                            <p>投稿するにはログインしてください！</p>
                        @endauth
                    </div>
                @endif
            </div>

            @foreach ($items as $val)
                <div class="shadow-lg bg-white dark:bg-gray-800 rounded-lg m-3 p-2">
                    <h2 class="text-2xl text-gray-900 dark:text-white">{{$val["title"]}}</h2>
                    <a href="#"><h2
                            class="text-xl text-gray-400 dark:text-white hover:text-gray-600 dark:hover:text-gray-400">
                            {{"@" . $val["id"]}}</h2></a>
                    <p class="text-base text-gray-900 dark:text-white">{{$val["text_body"]}}</p>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
