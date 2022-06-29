<div class="flex flex-row overflow-x-scroll no-scrollbar gap-3 px-[0.375rem] -ml-[0.375rem] mr-[0.375rem] whitespace-nowrap">
    {{-- Home button section --}}
    <div :class="{ 'bg-neutral-900 text-white tab-invert-rounded relative': tab === '#',
                   'text-neutral-300 hover:bg-neutral-800 hover:text-white': tab !== '#' }"
          class="flex flex-row rounded-t-md text-sm font-medium transition duration-100">
        
        <a href="#" x-on:click="tab='#'" class="px-3 py-2 md:hover:scale-125 origin-center transition-transform duration-75">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z" />
            </svg>
        </a>
    </div>
    
    @if(!empty($openmaps))
    <span class="block my-2 w-px bg-neutral-400"></span>
    @endif

    {{-- Maps row section --}}

    @isset($openmaps)
        @foreach ($openmaps as $map)
            <div :class="{ 'bg-neutral-900 text-white tab-invert-rounded relative': tab === '#{{ $map['uid'] }}', 'text-neutral-300 hover:bg-neutral-800 hover:text-white': tab !== '#{{ $map['uid'] }}' }"  
                class="flex flex-row rounded-t-md text-sm font-medium transition duration-100">
                <a href="#{{ $map['uid'] }}" x-on:click="tab='#{{ $map['uid'] }}'" class="px-3 py-2">
                    {{ $map['name'] }}
                </a>
                <a href="#" wire:click="delete('{{ $map['uid'] }}')" x-on:click.prevent="tab='#'" class="px-2 py-2 hover:scale-125 origin-center transition-transform duration-75">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        @endforeach
    @endisset
    
    @if(!empty($openmaps))
    <span class="block my-2 w-px bg-neutral-400"></span>
    @endif

    {{-- Easy access add/delete button section --}}

    <div class="my-1 flex flex-row rounded-md text-sm font-medium  text-neutral-300 hover:bg-neutral-800 hover:text-white hover:scale-110 origin-center transition-transform duration-75">
        <a href="#" x-on:click.prevent="tab='#'" class="px-1 p-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>
    <div class="my-1 flex flex-row rounded-md text-sm font-medium  text-neutral-300 hover:bg-neutral-800 hover:text-white hover:scale-110 origin-center transition-transform duration-75">
        <a href="#" wire:click="deleteAll" x-on:click.prevent="tab='#'" class="px-1 p-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </a>
    </div>
</div>
