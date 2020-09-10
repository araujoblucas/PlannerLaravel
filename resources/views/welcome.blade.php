<!DOCTYPE html>
<html lang="pt-BR">
<!-- lang="{{ str_replace('_', '-', app()->getLocale()) }} -->
    <head>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    </head>

    <body>
        <div class="flex bg-purple-800 w-full h-20 justify-end  ">
            <p class="mr-32 mt-6 text-white">
                <a href="{{ route('profile', Auth::user()->id) }}">
                    {{ Auth::user()->name }}
                </a>
            </p>
            <form method="post" action="{{ route('logout') }}">
                @method('post')
                @csrf
                   <button type="submit" class="mr-32 mt-6 text-white">
                        Sair
                   </button>
            </form>
        </div>

        @component('components._tasks_list', ['tasks' => $tasks])
            
        @endcomponent

    </body>
</html>
