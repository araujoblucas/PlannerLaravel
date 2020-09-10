<!DOCTYPE html>
<html lang="pt-BR">
<!-- lang="{{ str_replace('_', '-', app()->getLocale()) }} -->
<head>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <title>{{ config('app.name', 'Laravel') }}</title>


</head>

<body>
    <div id="app">
        <div class="flex bg-purple-800 w-full h-20 justify-end  ">
            @component('components._header')
            @endcomponent
        </div>

        <div class="flex justify-evenly">
            @yield('content')
        </div>
    </div>
</body>
</html>
