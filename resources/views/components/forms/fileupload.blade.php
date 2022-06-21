<form {{ $attributes->merge(['class' => 'flex items-center']) }} method="POST" action="/gbx" enctype="multipart/form-data">
    @csrf
    <label class="w-full" for="fileinput">
        <div class="grid grid-cols-[auto_1fr] gap-5 w-full py-2 px-4 rounded-md border-0 text-xl font-semibold bg-neutral-800 text-white hover:bg-neutral-700">
            @error('map')
                <div class="bg-red-600 py-1 px-3">{{ $message }}</div>
            @enderror
            <div class="bg-white h-16 w-16" style="-webkit-mask: url('/assets/file-import-solid.svg') no-repeat center; mask: url('/assets/file-import-solid.svg') no-repeat center;"></div>
            <div class="flex flex-col h-full justify-center">
                <h3>Choose map file</h3>
                <div class="flex justify-center">
                    <input type="file" name="map" id="fileinput" accept=".Map.Gbx" class="block file:hidden font-mono w-[14.1ch] text-sm" onchange="submit()">
                </div>
            </div>
        </button>
    </label>
</form>