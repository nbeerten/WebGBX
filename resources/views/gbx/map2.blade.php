@extends('layouts.app')
 
@section('title',  $map['name'])
 
@section('content')
    <div class="md:flex gap-4">
        <div class="md:w-2/6">
            <img src="{{ $thumbnail }}">
        </div>
        <div class="md:w-4/6">
            <h2 class="font-sans font-bold text-6xl">{{ $map['name']}}</h2>
            <h2 class="font-sans font-normal text-xl">By <span class="font-semibold">{{ $map['authorName']}}</span> from <span>{{ $map['authorZone']}}</span></h2>
        </div>
    </div>
@endsection