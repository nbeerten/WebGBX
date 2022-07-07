@php
$openmaps = session('user.openmaps');
@endphp
<div class="relative" x-data="{ tab: window.location.hash ? window.location.hash : '#' }" x-on:hashchange.window="window.location.hash = tab">
    <div class="w-full overflow-x-scroll -translate-y-full no-scrollbar absolute">
        @livewire('nav.map-tab-bar')
    </div>

    @isset($openmaps)
        @foreach ($openmaps as $map)
            @livewire('map-info.map', ['uid' => $map['uid']], key($map['uid']))
        @endforeach
    @endisset

    <div x-show="tab == '#'">
        <x-map-info.upload />
    </div>
</div>