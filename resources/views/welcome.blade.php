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

        <div class="p-2 shadow-2xl rounded flex flex-col w-6/12 border-4 border-r bg-white mt-12 ml-12">
            <h1 class="text-center text-teal-500 font-bold text-2xl color"> Quick Tasks</h1>
            <div class="mt-3">

                @forelse ($tasks as $task)
                    <div class="flex items-center border-b border-teal-500 py-2">
                        <form method="POST" action="{{ route('task_complete', $task->id) }}">
                            @method('PATCH')
                            @csrf
                        </form>
                        <form class="flex w-full" method="POST" action="{{ route('task_update_body', $task->id) }}">
                            @method('PATCH')
                            @csrf
                            <input name="fast_task" class="appearance-none bg-white border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" value="{{$task->fast_task}}">
                            <input type="submit" style="visibility: hidden;" />
                        </form>
                        <form class="mr-3" method="POST" action="{{ route('task_delete', $task->id) }}">
                            @method('PATCH')
                            @csrf
                            <button onclick="this.form.submit()" class="flex-shrink-0 bg-red-500 hover:bg-red-700 border-red-500 text-sm text-white py-1 px-2 rounded" type="button">
                                DELETE
                            </button>
                        </form>

                        <button class="flex-shrink-0 bg-gray-500 text-sm text-white py-1 px-2 rounded mr-5" disabled type="button">
                            {{ date('d-m', strtotime($task->updated_at)) }}
                        </button>
                            @if($task->completed == 0)
                                <form method="POST" action="{{ route('task_complete', $task->id) }}">
                                    @method('PATCH')
                                    @csrf
                                    <button onclick="this.form.submit()" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="button">
                                        Complete
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('task_uncomplete', $task->id) }}">
                                    @method('PATCH')
                                    @csrf
                                        <button onclick="this.form.submit()" class="flex-shrink-0 focus:outline-none bg-gray-500 text-sm text-white hover:bg-red-500 hover:text-gray-300 py-1 px-2 rounded" type="button">
                                            Completed
                                        </button>
                                </form>
                            @endif
                    </div>
                @empty
                    <div class="rounded w-full bg-gray-200 text-teal-500">
                        <p class="ml-12 py-3">No tasks yet...</p>
                    </div>
                @endforelse

                <form class="flex w-full" method="POST" action="{{ route('task_create')}}">
                    @method('POST')
                    @csrf
                    <div class="flex w-full items-center border-b border-teal-500 py-2">
                        <input name="fast_task" class="appearance-none bg-white border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Add task..." aria-label="Full name">
                        <button onclick="this.form.submit()" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="button">
                            Adicionar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
