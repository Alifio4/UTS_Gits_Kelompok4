<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            background-image: url('{{ asset("auth/images/bg.jpg") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        /* Add your other styles here */
    </style>
</head>

<body style="background-image: url({{ asset('assets/auth/images/bg.jpg') }}); background-position: center; background-repeat: no-repeat; background-size: cover;position: fixed;">
    <header>
        <nav class="bg-[#000000a6] border-[#000000a6] px-4 lg:px-6 py-2.5 dark:bg-[#000000a6]">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{ asset('assets/auth/images/icons/shop.png') }}" class="mr-3 h-6 sm:h-9"/>
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white text-shadow-xl">Kelompok 4</span>
                </a>
                <div class="flex items-center lg:order-2">
                    @if (Auth::check())
                        <a href="#" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-[#0000007a] bg-[#0000007a] dark:hover:bg-black focus:outline-none dark:focus:ring-black">Hi, {{ Auth::user()->name }}</a>
                        <a href="{{ url('/logout') }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Logout</a>
                    @else
                        <a href="{{ url('/login') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-[#0000007a] bg-[#0000007a] dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a>
                    @endif
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="{{ url('/product') }}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-white lg:p-0 dark:text-white lg:dark:hover:text-shadow dark:hover:bg-white dark:hover:text-shadow lg:dark:hover:bg-transparent dark:border-white">Produk</a>
                        </li>
                        <li>
                            <a href="{{ url('/category') }}" class="block py-2 pr-4 pl-3 text-white border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-white lg:p-0 dark:text-white lg:dark:hover:text-shadow dark:hover:bg-white dark:hover:text-shadow lg:dark:hover:bg-transparent dark:border-white">Kategori</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>

</html>
