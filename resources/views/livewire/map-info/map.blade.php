<div x-show="tab == '#{{ $uid }}'" x-cloak wire:ignore.self>
    <div wire:init="loadMap">
        @if($map !== null)
        <div class="flex flex-col md:flex-row gap-4 py-8">
            <div class="w-full md:w-2/6 rounded-md overflow-hidden">
                <img src="{{ route('gbxthumbnail', ['id' => $map['uid']]) }}" class="bg-slate-600 bg-gradient-to-tr from-slate-800 to-zinc-800 aspect-square md:aspect-auto rounded-md">
            </div>
            <div class="w-full md:w-4/6 flex flex-col gap-4">
                <section>
                    <h2 class="font-sans font-bold text-6xl">{!! $map['name']['html'] !!}</h2>
                    <h3 class="font-sans font-normal text-xl">By <span class="font-semibold">{{ $map['author']['name']}}</span></h3>
                    <p class="font-sans font-normal text-md"><span>{{ $map['author']['zone'] }}</span></p>
                </section>

                @isset($map['OMP'])
                <div>
                    <section class="px-4 py-3 bg-black rounded-md">
                        <div class="flex flex-col md:flex-row gap-2 md:gap-6 py-1">
                            <a href="{{ $map['OMP']['tmio']['url']  }}"
                                class="rounded-md bg-blue-600 w-full md:w-1/2 px-4 py-2 text-center">Trackmania.io</a>
                            <a href="{{ $map['OMP']['tmx'] }}"
                                class="rounded-md bg-green-900 w-full md:w-1/2 px-4 py-2 text-center">TrackmaniaExchange</a>
                        </div>
                        <div class="flex flex-col md:flex-row gap-2 md:gap-4">
                            <div class="w-full md:w-2/3">
                                <table class="table-auto w-full">
                                    <tbody>
                                        <tr>
                                            <td>Submitter</td>
                                            <td>{{ $map['OMP']['tmio']['submitterplayer']['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Timestamp</td>
                                            <td>{{ $map['OMP']['tmio']['timestamp'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="w-full md:w-1/3 flex flex-row gap-2 h-max">
                                <a href="{{ $map['OMP']['tmio']['fileUrl'] }}"
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
                </div>
                @endisset

                <section class="px-4 py-3 bg-black rounded-md">
                    <div class="md:flex gap-8">
                        <div class="md:w-1/2">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="m-0 w-10"></th>
                                        <th class="text-left pr-3 py-1">Medal</th>
                                        <th class="text-right px-3 py-1">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-2"><img class="h-5" src="/assets/medal_author.png"></td>
                                        <td class="text-left pr-3 py-1">Author Time</td>
                                        <td class="text-right px-3 py-1">{{ $map['medals']['author'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-2"><img class="h-5 w-5" src="/assets/medal_gold.png"></td>
                                        <td class="text-left pr-3 py-1">Gold Medal</td>
                                        <td class="text-right px-3 py-1">{{ $map['medals']['gold'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="px-2"><img class="h-5 w-5" src="/assets/medal_silver.png"></td>
                                        <td class="text-left pr-3 py-1">Silver Medal</td>
                                        <td class="text-right px-3 py-1">{{ $map['medals']['silver'] }}</td>
                                    </tr>
                                    <tr class="">
                                        <td class="px-2"><img class="h-5 w-5" src="/assets/medal_bronze.png"></td>
                                        <td class="text-left pr-3 py-1">Bronze Medal</td>
                                        <td class="text-right px-3 py-1">{{ $map['medals']['bronze'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="w-full md:w-1/2">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="text-left pr-3 py-1">Property</th>
                                        <th class="text-left py-1">Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left pr-2">Validated</td>
                                        <td>{{ $map['validated'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left pr-2">Multilap</td>
                                        <td>{{ $map['nbLaps'] == null ? "False" : "True"  }}</td>
                                    </tr>
                                    @if($map['nbLaps'] > 0)
                                    <tr>
                                        <td class="text-left pr-2">Amount of laps</td>
                                        <td>{{ $map['nbLaps'] }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="text-left pr-2 text-nowrap">Mod</td>
                                        <td class="truncate max-w-0" title="{{ $map['mod'] }}">{{ $map['mod'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        @endif
        <section class="mt-5 px-4 py-10 bg-black rounded-md w-full flex justify-center" wire:loading.flex wire:target="loadMap">
            <div class="loading-dots-3"></div>
        </section>
    </div>
</div>