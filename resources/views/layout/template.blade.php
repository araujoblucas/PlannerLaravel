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
                16:39
            </p>
        </div>

        <div class="rounded flex w-6/12 p-2 border bg-gray-300 mt-12 ml-12 shadow-lg ">
            @forelse ($tasks as $task)
                <div class="rounded h-12 w-full bg-gray-200">
                        {{$task->name}}
                </div>
            @empty
                <div class="rounded w-full bg-gray-200">
                    No tasks yet...
                </div>
            @endforelse
        </div>
    </body>
</html>
