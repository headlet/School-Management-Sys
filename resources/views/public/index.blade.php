@extends('layout.public.main')

@php
$p = asset("image/why/desktop-min.png");
@endphp

@section('content')

@include('public.components.hero')
@include('public.components.Info')
@include('public.components.gallery')
@include('public.components.contact')


@endsection