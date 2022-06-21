<nav
class="bg-zinc-900/50 backdrop-blur fixed z-50 top-0 left-0 right-0 w-full border-b border-zinc-500 shadow-2xl shadow-black/80">
<div class="max-w-7xl mx-auto px-2 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex-shrink-0 flex items-center">
                <img class="block h-8 w-auto border border-zinc-700 rounded-full shadow-md shadow-black/80" src="/assets/logo_plain.svg" alt="WebGBX">
                <h1 class="hidden lg:block ml-2 text-white text-xl font-bold">WebGBX</h1>
            </div>
            <div class="block ml-6">
                <div class="flex space-x-4">
                    @php
                        $homeactive = Request::routeIs('home');
                        $gbxactive = Request::routeIs('gbx');
                        $gbxid_active = Request::routeIs('gbxid');
                    @endphp

                    <a href="/" @class([
                        'px-3 py-2 rounded-md text-sm font-medium',
                        'bg-neutral-900 text-white' => $homeactive,
                        'text-neutral-300 hover:bg-neutral-700 hover:text-white ' => ! $homeactive
                    ]) aria-current="page">Home</a>
                    @hasSection ('map_name')
                        <div @class([
                            'px-3 py-2 rounded-md text-sm font-medium',
                            'bg-neutral-900 text-white' => ($gbxactive || $gbxid_active),
                            'text-neutral-300 hover:bg-neutral-700 hover:text-white ' => ! ($gbxactive || $gbxid_active)
                        ]) >@yield('map_name', 'Map File Information') <a href="/gbx/@yield('map_uid')/delete">X</a></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</nav>