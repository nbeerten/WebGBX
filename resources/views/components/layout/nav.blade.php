<nav class="fixed top-0 left-0 right-0 z-50 w-full border-b shadow-2xl bg-zinc-900/50 backdrop-blur border-zinc-500 shadow-black/80">
    <div class="pl-4 mx-auto max-w-7xl lg:pl-8">
        <div class="flex items-center justify-center h-16 sm:justify-start">
            <div class="flex items-center flex-shrink-0">
                <img class="block w-auto h-8 border rounded-full shadow-md border-zinc-700 shadow-black/80" src="/assets/logo_plain.svg" alt="WebGBX">
                <h1 class="hidden ml-2 text-xl font-bold text-white lg:block">WebGBX</h1>
            </div>
            <div class="flex ml-6 space-x-4">
                <a href="{{ route("home") }}" @class([
                    'px-3 py-2 rounded-md text-sm font-medium shrink-0 default-outline',
                    'bg-neutral-900 text-white' => Request::routeIs('home'),
                    'text-neutral-300 hover:bg-neutral-700 hover:text-white ' => ! Request::routeIs('home')
                ])>Home</a>
                <a href="{{ route("about") }}" @class([
                    'px-3 py-2 rounded-md text-sm font-medium shrink-0 default-outline',
                    'bg-neutral-900 text-white' => Request::routeIs('about'),
                    'text-neutral-300 hover:bg-neutral-700 hover:text-white ' => ! Request::routeIs('about')
                ])>About</a>
            </div>
        </div>
    </div>
</nav>