@extends('layouts.app')

@section('title', $map['name'])

@section('content')
<div class="md:flex gap-4 py-8">
    <div class="md:w-2/6 rounded-md overflow-hidden">
        <img src="{{ $thumbnail }}">
    </div>
    <div class="md:w-4/6">
        <h2 class="font-sans font-bold text-6xl">{!! $map['nameStyled'] !!}</h2>
        <hr class="my-1">
        <h3 class="font-sans font-normal text-xl">By <span class="font-semibold">{{ $map['authorName']}}</span></h3>
        <p class="font-sans font-normal text-md"><span>{{ $map['authorZone'] }}</span></p>

        <div class="md:flex gap-8 p-2 bg-black">
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
            <div class="md:w-1/2">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th>Property</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Validated</td>
                            <td>{{ $map['validated'] }}</td>
                        </tr>
                        <tr>
                            <td>Amount of laps</td>
                            <td>{{ $map['nblaps'] }}</td>
                        </tr>
                        <tr>
                            <td>Mod</td>
                            <td>{{ $map['mod'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection