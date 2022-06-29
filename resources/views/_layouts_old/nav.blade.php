<nav class="bg-zinc-900/50 backdrop-blur fixed z-50 top-0 left-0 right-0 w-full border-b border-zinc-500 shadow-2xl shadow-black/80">
    <div class="max-w-7xl mx-auto pl-4 lg:pl-8">
        <div class="flex items-center justify-center sm:justify-start h-16">
            <div class="flex-shrink-0 flex items-center">
                <img class="block h-8 w-auto border border-zinc-700 rounded-full shadow-md shadow-black/80" src="/assets/logo_plain.svg" alt="WebGBX">
                <h1 class="hidden lg:block ml-2 text-white text-xl font-bold">WebGBX</h1>
            </div>
            <div class="flex ml-6 overflow-hidden space-x-4">
                <a href="{{ route("home") }}" @class([
                    'px-3 py-2 rounded-md text-sm font-medium shrink-0',
                    'bg-neutral-900 text-white' => Request::routeIs('home'),
                    'text-neutral-300 hover:bg-neutral-700 hover:text-white ' => ! Request::routeIs('home')
                ])>Homepage</a>
                
                <a href="{{ route("maps.view") }}" @class([
                    'px-3 py-2 rounded-md text-sm font-medium shrink-0',
                    'bg-neutral-900 text-white' => Request::routeIs('maps.view'),
                    'text-neutral-300 hover:bg-neutral-700 hover:text-white ' => ! Request::routeIs('maps.view')
                ])>Maps</a>
            </div>
        </div>
    </div>
</nav>