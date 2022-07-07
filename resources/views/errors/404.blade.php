@extends('errors::themed')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
@section('custommessage', $exception->getMessage())
