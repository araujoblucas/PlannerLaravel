<p class="mr-32 mt-6 text-white">
    {{ Auth::user()->name }}
</p>
<form method="post" action="{{ route('logout') }}">
    @method('post')
    @csrf
    <button type="submit" class="mr-32 mt-6 text-white">
        Sair
    </button>
</form>