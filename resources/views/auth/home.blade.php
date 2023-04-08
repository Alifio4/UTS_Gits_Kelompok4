

@extends('auth.layouts.app')

@section('title', 'Homepage')

@section('content')
    <h1>Homepage</h1>
    @auth
        <p>{{ Auth::user()->name }}</p>
    @endauth
    @guest
        <p>Elu belum login</p>
    @endguest
@endsection