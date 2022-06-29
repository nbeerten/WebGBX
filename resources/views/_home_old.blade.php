<x-layout.app title="Home">

    <x-slot:hero>
        <div class="h-[50vh] w-full bg-hero-tm-tantoura bg-center bg-cover shadow-[inset_0px_-30px_50px_30px_rgba(0,0,0,0.3)] shadow-black/80 z-0 relative">
            <div class="grid place-content-center w-full h-full">
                <h1 class="block font-black text-6xl">WebGBX</h1>
            </div>
            <div class="block absolute bottom-5 left-1/2 -translate-x-1/2">
                <p>a</p>
            </div>
        </div>
    </x-slot:hero>
    
    <div class="flex flex-col items-center py-4">
        <h2 class="font-bold text-3xl py-4">How it works</h2>
        <div class="flex flex-col md:flex-row gap-4">
            <x-card1 
            title="1. Upload a GBX file" 
            content="Select the map file you want to view. Map files are usually located in the Trackmania game folder, located in the Documents folder of your user." 
            icon='<svg xmlns="http://www.w3.org/2000/svg" class="h-32 aspect-square" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
            </svg>' />
            <x-card1 
            title="2. Server parses map file" 
            content="After you've uploaded the file, the server will parse the map file. After loading the page it will check if the map identifier is found on the Nadeo's services. If so, it will show you links to relevant websites for the map file as well." 
            icon='<svg xmlns="http://www.w3.org/2000/svg" class="h-32 aspect-square" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>' />
            <x-card1 
            title="3. Information is sent to you" 
            content="After the server is done parsing the map file, it will redirect you to a special temporary page. This page is only visible to you, as the map information is stored in a session. Sessions are basically server storage connected to you, via a token stored in your cookies. This means that the URL of the page only works for you. For sharing the map, please use the Trackmania.io or TMX links provided." 
            icon='<svg xmlns="http://www.w3.org/2000/svg" class="h-32 aspect-square" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>' />
        </div>
        <div class="h-[1px] w-full bg-zinc-700 mt-4"></div>
    </div>

</x-layout.app>