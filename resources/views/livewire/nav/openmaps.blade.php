<div wire:init="loadopenmaps" class="flex flex-nowrap h-full grow overflow-x-scroll no-scrollbar rounded-md space-x-4 pr-2 lg:pr-8">
    @if($openmaps !== null)
        @foreach ($openmaps as $map)
        <span @class([
            'rounded-md text-sm font-medium flex flex-row whitespace-nowrap',
            'bg-neutral-900 text-white' => $current === $map['uid'],
            'text-neutral-300 hover:bg-neutral-700 hover:text-white ' => $current !== $map['uid']
            ])>
            <a href="/gbx/{{ $map['uid'] }}" class="px-3 py-2 whitespace-nowrap">
                {{ $map['name'] }}
            </a>
            <a href="/gbx/{{ $map['uid'] }}/delete" class="pr-3 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </span> 
        @endforeach
    @endif
</div>