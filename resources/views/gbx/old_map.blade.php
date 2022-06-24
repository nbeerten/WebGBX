@extends('layouts.app')

@section('title', $map['name'])
@section('map_name', $map['name'])
@section('map_uid', $map['uid'])

@section('content')
<div class="flex flex-col md:flex-row gap-4 py-8">
    <div class="w-full md:w-2/6 rounded-md overflow-hidden">
        <img src="{{ $thumbnail }}" class="bg-slate-600 bg-gradient-to-tr from-slate-800 to-zinc-800 aspect-square md:aspect-auto">
    </div>
    <div class="w-full md:w-4/6 flex flex-col gap-4">
        <section>
            <h2 class="font-sans font-bold text-6xl">{!! $map['namehtml'] !!}</h2>
            <h3 class="font-sans font-normal text-xl">By <span class="font-semibold">{{ $map['authorName']}}</span></h3>
            <p class="font-sans font-normal text-md"><span>{{ $map['authorZone'] }}</span></p>
        </section>
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
                                <td class="text-right px-3 py-1">{{ $map['authorTime'] }}</td>
                            </tr>
                            <tr>
                                <td class="px-2"><img class="h-5 w-5" src="/assets/medal_gold.png"></td>
                                <td class="text-left pr-3 py-1">Gold Medal</td>
                                <td class="text-right px-3 py-1">{{ $map['goldMedal'] }}</td>
                            </tr>
                            <tr>
                                <td class="px-2"><img class="h-5 w-5" src="/assets/medal_silver.png"></td>
                                <td class="text-left pr-3 py-1">Silver Medal</td>
                                <td class="text-right px-3 py-1">{{ $map['silverMedal'] }}</td>
                            </tr>
                            <tr class="">
                                <td class="px-2"><img class="h-5 w-5" src="/assets/medal_bronze.png"></td>
                                <td class="text-left pr-3 py-1">Bronze Medal</td>
                                <td class="text-right px-3 py-1">{{ $map['bronzeMedal'] }}</td>
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
                                <td>{{ $map['nblaps'] == null ? "False" : "True"  }}</td>
                            </tr>
                            @if($map['nblaps'] > 0)
                            <tr>
                                <td class="text-left pr-2">Amount of laps</td>
                                <td>{{ $map['nblaps'] }}</td>
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
@endsection