<div class="flex flex-col items-center pt-10">
    <h2 class="font-extrabold text-4xl">WebGBX</h2>
    <p class="text-lg">Upload a .Map.Gbx file to get started</p>

    <form method="POST" action="/open" enctype="multipart/form-data" class="flex flex-col gap-2 items-center py-4">
        @csrf
        <label class="w-full" for="fileinput">
            <div class="py-3 px-8 rounded-md border border-zinc-500 text-xl font-semibold bg-neutral-800 text-white hover:bg-neutral-700">
                <div class="flex flex-col h-full items-center">
                    <h3>Choose map file</h3>
                    <p class="file-name block font-mono text-sm">No file chosen</p>
                    <input id="fileinput" type="file" name="map" accept=".Map.Gbx" class="hidden" aria-hidden="true" onchange="submit()">
                </div>
            </div>
        </label>
    </form>
    <script>
        const file = document.querySelector('#fileinput');
        file.addEventListener('change', (e) => {
        // Get the selected file
        const [file] = e.target.files;
        // Get the file name and size
        const { name: fileName, size } = file;
        // Convert size in bytes to kilo bytes
        const fileSize = (size / 1048576).toFixed(3);
        // Set the text content
        const fileNameAndSize = `${fileName} - ${fileSize}MB`;
        document.querySelector('.file-name').textContent = fileNameAndSize;
        });
    </script>
</div>