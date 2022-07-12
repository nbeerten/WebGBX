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

        <div x-data="{ tab: '#grid' }">
            <div class="flex flex-row justify-end w-full pb-1">
                <div class="flex flex-row mt-2 overflow-hidden bg-black divide-x rounded-md divide-neutral-600 w-fit">
                    <button class="px-2 py-1 text-sm bg-neutral-800" x-on:click.prevent="tab='#grid'">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </button>
                    <button class="flex flex-row gap-2 px-2 py-1 text-sm text-neutral-300" x-on:click.prevent="tab='#raw'">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                        </svg>
                        Raw
                    </button>
                </div>
            </div>
            
            <div class="flex flex-col gap-4 pb-8 md:flex-row" x-show="tab == '#grid'">
                <div class="flex flex-col w-full gap-4 overflow-hidden rounded-md md:w-2/6">
                    <div class="bg-black rounded-md" x-data="{width: 0, height: 0}">
                        <img id="thumbnail_{{ $uid }}" src="{{ $map['thumbnail'] }}" class="rounded-md bg-slate-600 bg-gradient-to-tr from-slate-800 to-zinc-800 aspect-square md:aspect-auto"
                        x-on:load="width = document.querySelector('#thumbnail_{{ $uid }}').naturalWidth; height = document.querySelector('#thumbnail_{{ $uid }}').naturalHeight">
                        <div class="px-4 py-1 font-mono flex flex-row justify-between">
                            <div>
                                <span x-text="width" aria-label="width"></span><span aria-hidden="true">x</span><span x-text="height" aria-label="height"></span>px
                            </div>
                            <div>
                                <span>{{ $map['thumbnailsize'] }}</span>
                                <a class="inline" href="{{ $map['thumbnail'] }}" target="_blank" download="Thumbnail_{{ $map['name']['plain'] }}.jpg" title="Download Thumbnail">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline fill-neutral-300" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>

                    
                    <section class="px-4 py-3 bg-black rounded-md">
                        <div class="flex items-center gap-1 pb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-neutral-400" viewBox="0 0 20 20" fill="currentColor">
                                <circle cx="50%" cy="50%" r="40%" fill="none" stroke="currentColor" stroke-width="2"/>
                                <circle cx="50%" cy="50%" r="25%" fill="currentColor"/>
                            </svg>
                            <h3 class="font-bold">Medals</h3>
                        </div>

                        @if(boolval($map['validated']))
                        <table class="w-full table-auto">
                            <tbody>
                                <tr>
                                    <td class="py-1 pr-3 pl-0 flex items-center gap-1"><img class="w-5 h-5" src="{{ asset('storage/medal_author.png') }}">Author Time</td>
                                    <td class="px-3 py-1 text-right">{{ $map['medals']['author'] }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 pr-3 pl-0 flex items-center gap-1"><img class="w-5 h-5" src="{{ asset('storage/medal_gold.png') }}">Gold Medal</td>
                                    <td class="px-3 py-1 text-right">{{ $map['medals']['gold'] }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 pr-3 pl-0 flex items-center gap-1"><img class="w-5 h-5" src="{{ asset('storage/medal_silver.png') }}">Silver Medal</td>
                                    <td class="px-3 py-1 text-right">{{ $map['medals']['silver'] }}</td>
                                </tr>
                                <tr>
                                    <td class="py-1 pr-3 pl-0 flex items-center gap-1"><img class="w-5 h-5" src="{{ asset('storage/medal_bronze.png') }}">Bronze Medal</td>
                                    <td class="px-3 py-1 text-right">{{ $map['medals']['bronze'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @else
                        <p class="text-center text-neutral-300">Map is not validated.</p>
                        @endif
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
                        <div class="flex items-center gap-1 pb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-neutral-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd" />
                            </svg>
                            <h3 class="font-bold">Online Map Information</h3>
                        </div>
                        <div class="flex flex-col gap-2 py-1 md:flex-row md:gap-6">
                            <a href="{{ $map['OMS']['tmio']['url']  }}" target="_blank" class="w-full px-4 py-2 text-center bg-blue-600 rounded-md md:w-1/2">Trackmania.io</a>
                            <a href="{{ $map['OMS']['tmx'] }}" target="_blank" class="rounded-md bg-[#003228] hover:bg-[#00715a] w-full md:w-1/2 px-4 py-2 flex flex-row gap-2 place-content-center transition duration-75"><img class="w-4 h-4 my-auto" src="{{ asset('storage/trackmaniaexchange_sm.png') }}">TrackmaniaExchange</a>
                        </div>
                        <div class="w-full h-px my-2 bg-zinc-500"></div>
                        <div class="flex flex-col md:flex-row gap-y-2 md:gap-x-4">
                            <div class="w-full p-0 md:w-2/3 lg:w-1/2 md:pr-3">
                                <table class="w-full table-auto">
                                    <tbody>
                                        <tr>
                                            <td>Author</td>
                                            <td class="text-right">
                                                @isset($map['OMS']['tmio']['authorplayer']['tag'])
                                                    <span class="px-1 py-px rounded bg-neutral-800">[{!! $map['OMS']['tmio']['authorplayer']['tag'] !!}]</span> 
                                                @endisset
                                                {{ $map['OMS']['tmio']['authorplayer']['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Submitter</td>
                                            <td class="text-right">
                                                @isset($map['OMS']['tmio']['submitterplayer']['tag'])
                                                    <span class="px-1 py-px rounded bg-neutral-800">[{!! $map['OMS']['tmio']['submitterplayer']['tag'] !!}]</span>
                                                @endisset
                                                <span>{{ $map['OMS']['tmio']['submitterplayer']['name'] }}</span></td>
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
                        <div class="flex items-center gap-1 pb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-neutral-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            <h3 class="font-bold">Headers</h3>
                        </div>
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
                                            <td class="text-right">{!! $map['nbLaps'] == null ? $hi_x : "{$map['nbLaps']} ".Str::plural('lap', $map['nbLaps'])." ".$hi_checkmark !!}</td>
                                        </tr>
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

                    @isset($map['dependencies'])
                    <section class="px-4 py-3 bg-black rounded-md">
                        <div class="flex items-center gap-1 pb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-neutral-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                            </svg>
                            <h3 class="font-bold">Dependencies</h3>
                        </div>
                        <div class="flex flex-col w-full gap-2">
                            <div class="grid grid-cols-2 gap-2">
                                <p class="font-semibold text-left">File</p>
                                <p class="font-semibold text-center">Url</p>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach($map['dependencies'] as $dependency)
                                    <p class="text-left break-all truncate" title="{{ $dependency['file'] }}" dir="rtl">{{ $dependency['file'] }}</p>
                                    @if($dependency['url'] != '')
                                        <a class="text-right break-all truncate" title="{{ $dependency['url'] }}" dir="rtl" href="{{ $dependency['url'] }}" target="_blank">{{ $dependency['url'] }}</a>
                                    @else
                                        <p class="text-center">{!! $hi_x !!}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </section>
                    @endisset
                </div>
            </div>

            <div class="flex flex-col gap-4 pb-8 md:flex-row" x-show="tab == '#raw'">
                <div class="flex flex-col w-full gap-4 overflow-hidden rounded-md md:w-2/6">
                    <img src="{{ $map['thumbnail'] }}" class="rounded-md bg-slate-600 bg-gradient-to-tr from-slate-800 to-zinc-800 aspect-square md:aspect-auto">
                </div>

                <div class="flex flex-col w-full gap-4 md:w-4/6 overflow-hidden">
                    <section>
                        <h4 class="font-semibold">Chunk 03043005</h4>
                        <div class="overflow-x-scroll px-4 rounded-md no-scrollbar bg-neutral-800 prose prose-slate">
<pre><code class="language-html">
{{ $map['raw']['03043005'] }}
</code></pre>
                        </div>
                    </section>                    
                    <section>
                        <h4 class="font-semibold">Chunk 03043008</h4>
                        <div class="overflow-x-scroll px-4 py-2 rounded-md no-scrollbar bg-neutral-800 prose prose-slate">
                            <p class="font-mono whitespace-pre-line"
                            >   Author Login: {{ $map['raw']['03043008']['login'] }}
                                Author Name: {{ $map['raw']['03043008']['name'] }}
                                Author Zone: {{ $map['raw']['03043008']['zone'] }}
                            </p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        @endif
        <section class="flex justify-center w-full px-4 py-10 mt-5 bg-black rounded-md" wire:loading.flex wire:target="loadMap">
            <div class="loading-dots-3"></div>
        </section>
    </div>
</div>