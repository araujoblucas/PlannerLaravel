<!DOCTYPE html>
<html lang="pt-BR">
<!-- lang="{{ str_replace('_', '-', app()->getLocale()) }} -->
<head>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>

<body class="w-full h-screen flex justify-center bg-gray-100">
<div class=" w-4/12 flex flex-col self-center bg-white rounded-lg shadow-2xl justify-center align-content-center items-center" style="height:450px" >
    <h1 class="mb-8 font-mono text-5xl text-purple-500">Register</h1>
    <form class="w-full" method="POST" action="{{ route('register') }}">
        @csrf


        <div class="md:flex md:items-center justify-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Email
                </label>
            </div>
            <div class="md:w-2/3">
                <input name="email" class="form_input" id="inline-full-name" type="email" placeHolder="Your email">
            </div>
        </div>


        <div class="md:flex md:items-center justify-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Name
                </label>
            </div>
            <div class="md:w-2/3">
                <input name="name" class="form_input" id="inline-full-name" type="text" placeHolder="Your Name">
            </div>
        </div>


        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                    Password
                </label>
            </div>
            <div class="md:w-2/3">
                <input name="password" class="form_input" id="inline-password" type="password" placeholder="*********">
            </div>
        </div>


        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="password-confirm" >
                    Confirm Password
                </label>
            </div>
            <div class="md:w-2/3">
                <input type="password" name="password_confirmation" class="form_input" placeholder="*********">
            </div>
        </div>


        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    Cadastrar
                </button>

                <a href="{{ route('login') }}" class="shadow bg-purple-500 hover:bg-purple-400 opacity-50 hover:opacity-100 focus:shadow-outline focus:outline-none text-white font-bold py-3 px-4 rounded">
                    Voltar
                </a>
            </div>
        </div>


    </form>
</div>

</body>
</html>
