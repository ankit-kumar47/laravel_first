@if (session()->has('message'))
    <div id="flash-body"
        class=" fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-10 py-3 flex gap-10">
        <p>{{ session('message') }}</p>
        <button id="flash-close"
            class="text-3xl hover:outline outline-2  outline-offset-2 outline-slate-300 transition-all">&cross;</button>
    </div>
@endif
