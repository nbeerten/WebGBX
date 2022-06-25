<div wire:init="loadOMS">
    @if($OnlineMapServices !== null)
    <section class="px-4 py-3 bg-black rounded-md">
        <div class="flex flex-col md:flex-row gap-2 md:gap-6 py-1">
            <a href="{{ $OnlineMapServices['tmio']['url']  }}"
                class="rounded-md bg-blue-600 w-full md:w-1/2 px-4 py-2 text-center">Trackmania.io</a>
            <a href="{{ $OnlineMapServices['tmx'] }}"
                class="rounded-md bg-green-900 w-full md:w-1/2 px-4 py-2 text-center">TrackmaniaExchange</a>
        </div>
        <h4 class="font-semibold">Online Info</h4>
        <div class="flex flex-col md:flex-row gap-2 md:gap-4">
            <div class="w-full md:w-2/3">
                <table class="table-auto w-full">
                    <tbody>
                        <tr>
                            <td>Submitter</td>
                            <td>{{ $OnlineMapServices['tmio']['submitterplayer']['name'] }}</td>
                        </tr>
                        <tr>
                            <td>Timestamp</td>
                            <td>{{ $OnlineMapServices['tmio']['timestamp'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="w-full md:w-1/3 flex flex-row gap-2 h-max">
                <a href="{{ $OnlineMapServices['tmio']['fileUrl'] }}"
                    class="flex-1 grid place-content-center bg-neutral-800 hover:bg-neutral-700 text-white text-center font-bold py-2 px-4 rounded-md">Download</a>
                <button
                    class="grid place-content-center bg-neutral-800 hover:bg-neutral-700 text-white p-1 rounded-md aspect-square">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z" />
                        <path d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z" />
                      </svg>
                </button>
            </div>
        </div>
    </section>
    @endif
</div>