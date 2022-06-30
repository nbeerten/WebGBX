@php
$hi_checkmark = '<svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>';

$hi_x = '<svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>';
@endphp

<div x-show="tab == '#{{ $uid }}'" x-cloak wire:ignore.self>
    <div wire:init="loadMap">
        @if($map !== null)
        <div class="flex flex-col md:flex-row gap-4 py-8">
            <div class="w-full md:w-2/6 rounded-md overflow-hidden">
                <img src="{{ $map['thumbnail'] }}" class="bg-slate-600 bg-gradient-to-tr from-slate-800 to-zinc-800 aspect-square md:aspect-auto rounded-md">
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
                                class="rounded-md bg-[#003228] hover:bg-[#00715a] w-full md:w-1/2 px-4 py-2 flex flex-row gap-2 place-content-center transition duration-75"><img class="my-auto h-4 w-4" src="/assets/x_w_sm.png">TrackmaniaExchange</a>
                        </div>
                        <div class="h-px w-full bg-zinc-500 my-2"></div>
                        <h4 class="font-bold my-1">Online Map Information</h4>
                        <div class="flex flex-col md:flex-row gap-y-2 md:gap-x-4">
                            <div class="w-full md:w-2/3 lg:w-1/2 p-0 md:pr-3">
                                <table class="table-auto w-full">
                                    <tbody>
                                        <tr>
                                            <td>Author</td>
                                            <td class="text-right">[{!! $map['OMP']['tmio']['authorplayer']['tag'] !!}] {{ $map['OMP']['tmio']['authorplayer']['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Submitter</td>
                                            <td class="text-right">[{!! $map['OMP']['tmio']['submitterplayer']['tag'] !!}] {{ $map['OMP']['tmio']['submitterplayer']['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Time uploaded</td>
                                            <td class="text-right">{{ $map['OMP']['tmio']['timestamp'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Filename</td>
                                            <td class="text-right font-mono">{{ $map['OMP']['tmio']['fileName'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="w-full md:w-1/3 lg:w-1/2 flex flex-col gap-y-1">
                                <h5 class="font-semibold">Nadeo File URLs:</h5>
                                <div class="flex flex-row gap-1 w-full">
                                    <a href="{{ $map['OMP']['tmio']['fileUrl'] }}"
                                        class="flex-1 grid place-content-center grid-flow-col-dense gap-2 bg-neutral-800 hover:bg-neutral-700 text-white text-center font-bold py-2 px-4 rounded-md transition duration-75">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                            <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                        </svg>
                                        Map Download</a>
                                    <button class="grid place-content-center bg-neutral-800 hover:bg-neutral-700 focus:bg-green-700 focus-visible:bg-neutral-700 text-white p-1 rounded-md aspect-square transition duration-75" x-on:click="$clipboard('{{ $map['OMP']['tmio']['fileUrl'] }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z" />
                                            <path d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex flex-row gap-1 w-full">
                                    <a href="{{ $map['OMP']['tmio']['thumbnailUrl'] }}"
                                        class="flex-1 grid place-content-center grid-flow-col-dense gap-2 bg-neutral-800 hover:bg-neutral-700 text-white text-center font-bold py-2 px-4 rounded-md transition duration-75">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                            <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                        </svg>
                                        Thumbnail Download</a>
                                    <button class="grid place-content-center bg-neutral-800 hover:bg-neutral-700 focus:bg-green-700 focus-visible:bg-neutral-700 text-white p-1 rounded-md aspect-square transition duration-75" x-on:click="$clipboard('{{ $map['OMP']['tmio']['thumbnailUrl'] }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z" />
                                            <path d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                @endisset

                <section class="px-4 py-3 bg-black rounded-md">
                    <div class="md:flex gap-8">                        
                        <div class="w-full md:w-1/2">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="text-left pr-3 py-1">Headers</th>
                                        <th class="text-left py-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left pr-2">Validated</td>
                                        <td class="text-right">{!! boolval($map['validated']) ? $hi_checkmark : $hi_x !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left pr-2">Multilap</td>
                                        <td class="text-right">{!! $map['nbLaps'] == null ? $hi_x : $hi_checkmark !!}</td>
                                    </tr>
                                    @if($map['nbLaps'] > 0)
                                    <tr>
                                        <td class="text-left pr-2">Amount of laps</td>
                                        <td class="text-right">{{ $map['nbLaps'] }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="text-left pr-2 text-nowrap">Mod</td>
                                        <td class="truncate max-w-0 text-right" title="{{ $map['mod'] }}">{!! $map['mod'] == null ? $hi_x : $map['mod'] !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left pr-2">Ghost Blocks</td>
                                        <td class="text-right">{!! boolval($map['hasGhostBlocks']) ? $hi_checkmark : $hi_x !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left pr-2">Display Cost</td>
                                        <td class="text-right font-mono">{{ $map['displayCost'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left pr-2">Exe Build</td>
                                        <td class="text-right font-mono text-sm">{{ $map['exeBuild'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left pr-2">Exe Version</td>
                                        <td class="text-right font-mono text-sm">{{ $map['exeVersion'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left pr-2">Lightmap</td>
                                        <td class="text-right font-mono">{{ $map['lightmap'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left pr-2">Mood</td>
                                        <td class="text-right">{{ $map['mood'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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