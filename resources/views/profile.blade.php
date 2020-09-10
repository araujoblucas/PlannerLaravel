

@extends ('layout.template')
    
    @section('header')

    @endsection

    @section('content')
        <div class="p-2 shadow-2xl rounded flex flex-col w-5/12 border-4 border-r bg-white mt-12">
            <h1 class="text-center my-4 text-teal-500 font-bold text-2xl color"> Meu Cadastro</h1>
            <form class="w-full" method="POST" action="{{ route('update_profile') }}">
                @method('put')
                @csrf
                <div class="md:flex md:items-center justify-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                            Email
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input name="email" class="form_input" id="inline-full-name" type="email" value="{{ Auth::user()->email }}" placeHolder="Your email">
                        @error('email')
                            <span class="text-sm text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="md:flex md:items-center justify-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                            Name
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input name="name" class="form_input" id="inline-full-name" type="text" value="{{ Auth::user()->name }}" placeHolder="Your Name">
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                            Senha
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input name="password" class="form_input" id="inline-password" type="password" placeholder="*********">
                        @error('password')
                            <span class="text-sm text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="password-confirm" >
                            Repita a nova senha
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input type="password" name="password_confirmation" class="form_input" placeholder="*********">
                    </div>
                </div>

                @component('components._error')
                @endcomponent

                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 mb-3 px-4 rounded" type="submit">
                            Atualizar
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <new-mensal-debt></new-mensal-debt>

        <div class="p-2 shadow-2xl rounded flex flex-col w-5/12 border-4 border-r bg-white mt-12">
            <h1 class="text-center my-4 text-teal-500 font-bold text-2xl color"> Contas do mês {{ $mensal->month }} de {{ $mensal->year }}</h1>
            <div class="flex">
                <a @click.prevent="$modal.show('new-mensal-debt')" href="" class="flex w-2/6 font-bold text-gray-700 hover:text-white bg-teal-100 hover:bg-teal-400 border-r justify-center py-3">Criar</a>
                <a href="#" class="flex w-2/6 font-bold text-gray-700 hover:text-white bg-teal-100 hover:bg-teal-400 border-r justify-center py-3">Listar</a>
                <a href="#"  class="flex w-2/6 font-bold text-gray-700 hover:text-white bg-teal-100 hover:bg-teal-400 justify-center py-3">Próximo</a>
            </div>

                <div class="w-full flex mt-2 border-b-4 border-gray-300 ">
                    <div class="flex w-6/12 text-lg border-r-4 font-bold justify-center ">
                        Descrição
                    </div>
                    <div class="flex w-2/12 text-lg border-r-4 font-bold justify-center ">
                        Valor
                    </div>
                    <div class="flex w-2/12 text-lg border-r-4 font-bold justify-center ">
                        Dia
                    </div>
                    <div class="flex w-2/12 text-lg font-bold justify-center ">
                        Pago
                    </div>
                </div>
                <?php
                // use the factory to create a Faker\Generator instance
                $faker = Faker\Factory::create();
                ?>
                <div class="w-full flex flex-col ">
                    @foreach ($debts as $key => $debt)

                       <div class="flex flex-wrap py-4 w-full border-b-2 border-gray-400 {{ $key%2 == 0 ? 'bg-gray-100' : ''}}">
                           <div class="flex w-6/12 text-md border-r-2 border-gray-400 justify-center ">
                                {{ $debt->desc }}
                           </div>
                           <div class="flex w-2/12 text-md border-r-2 border-gray-400 justify-center ">
                               R$ {{number_format((float)$debt->price, 2, ',', '')}}
                           </div>
                           <div class="flex w-2/12 text-md border-r-2 border-gray-400 justify-center ">
                               {{ $debt->day }}
                           </div>
                           <div class="flex w-2/12 text-md justify-center ">
                                <form method="post" action="{{ route('update_payment', $debt->id) }}">
                                    <input onclick="this.form.submit()" type="checkbox" {{ $debt->paid ? 'checked' : ''}}>
                                </form>
                           </div>
                       </div>
                    @endforeach
                </div>

                <div class="w-full flex mt-2 border-b-4 border-gray-300 ">
                    <div class="flex w-4/6 text-lg border-r-4 font-bold justify-center ">
                        Total:
                    </div>
                    <div class="flex w-2/6 text-lg font-bold justify-center ">
                        R$ {{number_format((float)$mensal->total, 2, ',', '')}}
                    </div>
                </div>

            </div>


        <div id='app'></div>
        </div>

    @endsection