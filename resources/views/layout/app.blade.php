<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Hello world</title>
        {{--<link rel="stylesheet" href="{{ asset('css/app.css')}}"> NPM RUN DEV AND SELECTS THE BEST--}}

        <script src="https://cdn.tailwindcss.com"></script>

    </head>

    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex items-center">

                <li><a href="/" class="p-3">Home</a></li>

                <li><a href="{{route('dashboard')}}" class="p-3">Dash</a></li>

                <li><a href="{{route('posts') }}" class="p-3">Post</a></li>

            </ul>

            <ul class="flex items-center">

                @auth
                    <li><a href="" class="p-3">{{ auth()->user()->name }}{{--access data from the auth data--}}</a></li>

                    <form action="{{route('logout')}}" method="post" class=" inline">
                        @csrf
                        <button type="submit" >Logout</button>
                       {{-- <li><a href="{{route('logout')}}" class="p-3">Logout</a></li>--}}
                    </form>

                @endauth

                @guest
                    <li><a href="{{route('login')}}" class="p-3">Login</a></li>

                    <li><a href="{{ route('register') }}" class="p-3">Register</a></li>

                @endguest

            </ul>


        </nav>

        @yield('content')
    </body>

</html>
