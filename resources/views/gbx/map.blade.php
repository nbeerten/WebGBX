@extends('layouts.app')

@section('title', $map['name'])
@section('map_name', $map['name'])
@section('map_uid', $map['uid'])

@section('content')
@livewire('map-info.show', ['map' => $map, 'thumbnail' => $thumbnail])
@endsection