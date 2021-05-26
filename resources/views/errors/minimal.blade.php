<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">



</head>

<body class="antialiased">
    <div class="bg-gray-100 px-5 py-2 object-right text-right dark:bg-gray-900">
        <form action="{{ route('logout') }}"" method="post">
            @csrf
           
        <button type="submit" class=" uppercase text-sm rounded border px-2 py-1 text-pink-500 border-pink-500 ">

            Log Out
            <i class="far fa-sign-out" aria-hidden="true"></i>
        </button>
        </form>
    </div>
    <div
        class="relative flex flex-col items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class=" max-w-xl mx-auto sm:px-6 lg:px-8 mb-2 ">
            <img class="mx-auto w-1/3 text-center object-center filter grayscale object-contain opacity-75 "
                src="/img/logo.png" />
        </div>
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

            <div class=" flex flex-row justify-center items-center pt-8 sm:justify-start sm:pt-0">
                <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">
                    @yield('code')
                </div>

                <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
                    @yield('message')
                </div>
            </div>
        </div>
    </div>
</body>

</html>