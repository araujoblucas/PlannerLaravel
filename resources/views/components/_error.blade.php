@if (Session::has('message_error'))
    <span id="id-alert" class="ml-8 font-bold text-md-center text-red-500" role="alert">
                        {{ Session::pull('message_error') }}
                    </span>
@endif
@if (Session::has('message_success'))
    <span id="id-alert" class="ml-8 font-bold text-md-center text-green-500" role="alert">
                        {{ Session::pull('message_success') }}
                    </span>
@endif