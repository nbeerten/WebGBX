@extends('layouts.app')
 
@section('title', 'Home')

@section('hero')
<div class="h-[50vh] w-full bg-hero-tm-tantoura bg-center bg-cover shadow-[inset_0px_-30px_50px_30px_rgba(0,0,0,0.3)] shadow-black/80 z-0 relative">
    <div class="grid place-content-center w-full h-full">
        <h1 class="block font-black text-6xl">WebGBX</h1>
    </div>
    <div class="block absolute bottom-5 left-1/2 -translate-x-1/2">
        <x-forms.fileupload class="w-full"/>
    </div>
</div>
@endsection
 
@section('content')
@endsection