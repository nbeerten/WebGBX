<form {{ $attributes->merge(['class' => 'flex items-center']) }} method="POST" action="/gbx" enctype="multipart/form-data">
    @csrf
    <label class="w-full" for="fileinput">
        <div class="grid grid-cols-[auto_1fr] gap-5 w-full py-2 px-4 rounded-md border-0 text-xl font-semibold bg-neutral-800 text-white hover:bg-neutral-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <div class="flex flex-col h-full justify-center">
                <h3>Choose map file</h3>
                <div class="flex justify-center">
                    <input type="file" name="map" id="fileinput" accept=".Map.Gbx" class="block file:hidden font-mono w-[14.1ch] text-sm" onchange="submit()">
                </div>
            </div>
        </button>
    </label>
</form>