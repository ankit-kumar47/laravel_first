<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel App</title>
    <link rel="icon" href={{ asset('images/favicon.ico') }} />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
</head>

<body class="mb-48">
    <x-flash-message />

    <nav class="flex justify-between items-center mb-4">
        <a href="{{ env('APP_URL') }}"><img class="w-24" src={{ asset('images/logo.png') }} alt=""
                class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <a href="{{ env('APP_URL') }}/users/profile" class="hover:text-laravel">
                        <h3>Welcome {{ auth()->user()->name }} </h3>
                    </a>
                </li>
                <li>
                    <a href="{{ env('APP_URL') }}/listing/manage" class="hover:text-laravel"><i
                            class="fa-solid fa-gear"></i>
                        Manage Listings</a>
                </li>
                <li>
                    <form action="{{ env('APP_URL') }}/logout" method="post">
                        @csrf
                        <button class="hover:text-laravel"><i class="fa-solid fa-door-closed"></i>Logout</button>
                    </form>
                </li>
            @else
                @if (url()->current() == env('APP_URL') . '/register')
                    <li>
                        <a href="{{ env('APP_URL') }}/signin" class="hover:text-laravel"><i
                                class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a>
                    </li>
                @elseif (url()->current() == env('APP_URL') . '/signin')
                    <li>
                        <a href="{{ env('APP_URL') }}/register" class="hover:text-laravel"><i
                                class="fa-solid fa-user-plus"></i>
                            Register</a>
                    </li>
                @else
                    <li>
                        <a href="{{ env('APP_URL') }}/register" class="hover:text-laravel"><i
                                class="fa-solid fa-user-plus"></i>
                            Register</a>
                    </li>
                    <li>
                        <a href="{{ env('APP_URL') }}/signin" class="hover:text-laravel"><i
                                class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a>
                    </li>
                @endif
            @endauth
        </ul>
    </nav>
    <main>
        @if (url()->current() != env('APP_URL'))
            <x-back-button />
        @endif
        @yield('content')
    </main>

    @include('partials._footer')
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
