<div class="flex flex-col items-center pt-10">
    <h2 class="font-extrabold text-4xl">WebGBX</h2>
    <p class="text-lg">Upload a .Map.Gbx file to get started</p>

    <form method="POST" action="/open" enctype="multipart/form-data" class="flex flex-col gap-2 items-center py-4">
        @csrf
        <label class="w-full" for="fileinput">
            <div class="py-3 px-8 rounded-md border border-zinc-500 text-xl font-semibold bg-neutral-800 text-white hover:bg-neutral-700 cursor-pointer default-outline" tabindex="0" onkeypress="this.click();">
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

    <div class="h-px w-full bg-zinc-500 mt-12 mb-8"></div>

    <section class="flex flex-row gap-8 w-full">
        <div class="w-2/3 rounded-md aspect-video bg-neutral-800 grid place-content-center">
            <img src="/assets/13-14_30-06_1920x1080.png">
        </div>
        <div class="w-1/3">
            <p>
                <span class="font-bold">WebGBX</span> is a web application for uploading and viewing .Map.Gbx files.
                This tool allows you to easily view the map and its headers right from your browser. No installation needed.
                All data related to the map is stored on the server, in a session. When you choose a map a unique identifier get's created, this identifier will be stored
                in your browser and on the server. All map information (including but not limited to thumbnail, author, map name, etc.) will not be public,
                because the server checks for the unique identifier. For sharing a map you can use services like <a href="https://trackmania.io/" class="underline text-blue-500 hover:text-blue-600">Trackmania.io</a> or <a href="https://trackmania.exchange/" class="underline text-blue-500 hover:text-blue-600">Trackmania.exchange</a>.
            </p>
        </div>
    </section>
</div>