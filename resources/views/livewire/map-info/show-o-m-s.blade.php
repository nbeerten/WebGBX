<div wire:init="loadOMS">
@if($OnlineMapServices !== null)
<section class="px-4 py-3 bg-black rounded-md">
    <div class="flex flex-col md:flex-row gap-2 md:gap-6 py-1">
        <a href="{{ $OnlineMapServices['tmio']['url']  }}" class="rounded-md bg-blue-600 w-full md:w-1/2 px-4 py-2 text-center">Trackmania.io</a>
        <a href="{{ $OnlineMapServices['tmx'] }}" class="rounded-md bg-green-900 w-full md:w-1/2 px-4 py-2 text-center">TrackmaniaExchange</a>
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
            <a href="{{ $OnlineMapServices['tmio']['fileUrl'] }}" class="flex-1 grid place-content-center bg-neutral-800 hover:bg-neutral-700 text-white text-center font-bold py-2 px-4 rounded-md">Download</a>
            <button class="grid place-content-center bg-neutral-800 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-md aspect-square">
                <div class="bg-white h-full aspect-square p-1" style="-webkit-mask: url('/assets/copy-solid.svg') no-repeat center; mask: url('/assets/copy-solid.svg') no-repeat center; transform: scale(1.5);"></div>
            </button>
        </div>
    </div>
</section>
@endif
</div>