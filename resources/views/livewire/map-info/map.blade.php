@php
$hi_checkmark = '<svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>';

$hi_x = '<svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>';
@endphp

<div x-show="tab == '#{{ $uid }}'" x-cloak wire:ignore.self>
    <div wire:init="loadMap">
        @if($map !== null)
        <div class="flex flex-col gap-4 py-8 md:flex-row">
            <div class="flex flex-col w-full gap-4 overflow-hidden rounded-md md:w-2/6">
                <img src="{{ $map['thumbnail'] }}" class="rounded-md bg-slate-600 bg-gradient-to-tr from-slate-800 to-zinc-800 aspect-square md:aspect-auto">
                <section class="px-4 py-3 bg-black rounded-md">
                    <h3 class="font-bold">Medals</h3>
                    <table class="w-full table-auto">
                        <tbody>
                            <tr>
                                <td class="pl-2"><img class="w-5 h-5" src="/assets/medal_author.png"></td>
                                <td class="py-1 pr-3 text-left">Author Time</td>
                                <td class="px-3 py-1 text-right">{{ $map['medals']['author'] }}</td>
                            </tr>
                            <tr>
                                <td class="pl-2"><img class="w-5 h-5" src="/assets/medal_gold.png"></td>
                                <td class="py-1 pr-3 text-left">Gold Medal</td>
                                <td class="px-3 py-1 text-right">{{ $map['medals']['gold'] }}</td>
                            </tr>
                            <tr>
                                <td class="pl-2"><img class="w-5 h-5" src="/assets/medal_silver.png"></td>
                                <td class="py-1 pr-3 text-left">Silver Medal</td>
                                <td class="px-3 py-1 text-right">{{ $map['medals']['silver'] }}</td>
                            </tr>
                            <tr>
                                <td class="pl-2"><img class="w-5 h-5" src="/assets/medal_bronze.png"></td>
                                <td class="py-1 pr-3 text-left">Bronze Medal</td>
                                <td class="px-3 py-1 text-right">{{ $map['medals']['bronze'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </div>
            <div class="flex flex-col w-full gap-4 md:w-4/6">
                <section>
                    <h2 class="font-sans text-6xl font-bold">{!! $map['name']['html'] !!}</h2>
                    <h3 class="font-sans text-xl font-normal">By <span class="font-semibold">{{ $map['author']['name']}}</span></h3>
                    <p class="font-sans font-normal text-md"><span>{{ $map['author']['zone'] }}</span></p>
                </section>

                @isset($map['OMS'])
                <section class="px-4 py-3 bg-black rounded-md">
                    <div class="flex flex-col gap-2 py-1 md:flex-row md:gap-6">
                        <a href="{{ $map['OMS']['tmio']['url']  }}"
                            class="w-full px-4 py-2 text-center bg-blue-600 rounded-md md:w-1/2">Trackmania.io</a>
                        <a href="{{ $map['OMS']['tmx'] }}"
                            class="rounded-md bg-[#003228] hover:bg-[#00715a] w-full md:w-1/2 px-4 py-2 flex flex-row gap-2 place-content-center transition duration-75"><img class="w-4 h-4 my-auto" src="/assets/x_w_sm.png">TrackmaniaExchange</a>
                    </div>
                    <div class="w-full h-px my-2 bg-zinc-500"></div>
                    <div class="flex flex-col md:flex-row gap-y-2 md:gap-x-4">
                        <div class="w-full p-0 md:w-2/3 lg:w-1/2 md:pr-3">
                            <h4 class="my-1 font-bold">Online Map Information</h4>
                            <table class="w-full table-auto">
                                <tbody>
                                    <tr>
                                        <td>Author</td>
                                        <td class="text-right"><span class="px-1 py-px rounded bg-neutral-800">[{!! $map['OMS']['tmio']['authorplayer']['tag'] !!}]</span> {{ $map['OMS']['tmio']['authorplayer']['name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Submitter</td>
                                        <td class="text-right"><span class="px-1 py-px rounded bg-neutral-800">[{!! $map['OMS']['tmio']['submitterplayer']['tag'] !!}]</span> {{ $map['OMS']['tmio']['submitterplayer']['name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Time uploaded</td>
                                        <td class="text-right">{{ $map['OMS']['tmio']['timestamp'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Filename</td>
                                        <td class="font-mono text-right">{{ $map['OMS']['tmio']['fileName'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-col w-full md:w-1/3 lg:w-1/2 gap-y-1">
                            <h5 class="my-1 font-bold">Nadeo File URLs:</h5>
                            <div class="flex flex-row w-full gap-1">
                                <a href="{{ $map['OMS']['tmio']['fileUrl'] }}"
                                    class="grid flex-1 grid-flow-col-dense gap-2 px-4 py-2 font-bold text-center text-white transition duration-75 rounded-md place-content-center bg-neutral-800 hover:bg-neutral-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                        <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                    </svg>
                                    Map Download</a>
                                <button class="grid p-1 text-white transition duration-75 rounded-md place-content-center bg-neutral-800 hover:bg-neutral-700 focus:bg-green-700 focus-visible:bg-neutral-700 aspect-square" x-on:click="$clipboard('{{ $map['OMS']['tmio']['fileUrl'] }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z" />
                                        <path d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flex flex-row w-full gap-1">
                                <a href="{{ $map['OMS']['tmio']['thumbnailUrl'] }}"
                                    class="grid flex-1 grid-flow-col-dense gap-2 px-4 py-2 font-bold text-center text-white transition duration-75 rounded-md place-content-center bg-neutral-800 hover:bg-neutral-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                        <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                    </svg>
                                    Thumbnail Download</a>
                                <button class="grid p-1 text-white transition duration-75 rounded-md place-content-center bg-neutral-800 hover:bg-neutral-700 focus:bg-green-700 focus-visible:bg-neutral-700 aspect-square" x-on:click="$clipboard('{{ $map['OMS']['tmio']['thumbnailUrl'] }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M8 2a1 1 0 000 2h2a1 1 0 100-2H8z" />
                                        <path d="M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm font-light text-right">Powered by the <a href="https://trackmania.io/">Trackmania.io</a> API</p>
                </section>
                @endisset

                <section class="px-4 py-3 bg-black rounded-md">
                    <h3 class="font-bold">Headers</h3>
                    <div class="gap-8 md:flex">                     
                        <div class="w-full md:w-1/2">
                            <table class="w-full table-auto">
                                <tbody>
                                    <tr>
                                        <td class="pr-2 text-left">Validated</td>
                                        <td class="text-right">{!! boolval($map['validated']) ? $hi_checkmark : $hi_x !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 text-left">Multilap</td>
                                        <td class="text-right">{!! $map['nbLaps'] == null ? $hi_x : $hi_checkmark !!}</td>
                                    </tr>
                                    @if($map['nbLaps'] > 0)
                                    <tr>
                                        <td class="pr-2 text-left">Amount of laps</td>
                                        <td class="text-right">{{ $map['nbLaps'] }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="pr-2 text-left">Ghost Blocks</td>
                                        <td class="text-right">{!! boolval($map['hasGhostBlocks']) ? $hi_checkmark : $hi_x !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 text-left text-nowrap">Mod</td>
                                        <td class="text-right truncate max-w-0" title="{{ $map['mod'] }}">{!! $map['mod'] == null ? $hi_x : $map['mod'] !!}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 text-left">Comment</td>
                                        <td class="text-right">{!! $map['comments'] == '' ? $hi_x : $hi_checkmark !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="md:w-1/2">
                            <table class="w-full table-auto">
                                <tbody>
                                    <tr>
                                        <td class="pr-2 text-left">Display Cost</td>
                                        <td class="font-mono text-right">{{ $map['displayCost'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 text-left">Exe Build</td>
                                        <td class="font-mono text-sm text-right">{{ $map['exeBuild'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 text-left">Exe Version</td>
                                        <td class="font-mono text-sm text-right">{{ $map['exeVersion'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 text-left">Lightmap</td>
                                        <td class="font-mono text-right">{{ $map['lightmap'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="pr-2 text-left">Mood</td>
                                        <td class="text-right">{{ $map['mood'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if($map['comments'] != '')
                        <div class="px-3 py-2 rounded bg-neutral-800">
                            <p>“{{ $map['comments'] }}”</p>
                        </div>
                    @endif
                </section>
            </div>
        </div>
        @endif
        <section class="flex justify-center w-full px-4 py-10 mt-5 bg-black rounded-md" wire:loading.flex wire:target="loadMap">
            <div class="loading-dots-3"></div>
        </section>
    </div>
</div>