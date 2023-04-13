@extends('auth.layouts.auth')

@section('title', 'login')

@section('content')
<div class="container" style="margin-top: 10%!important;">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <h1 class="display-1 text-center mb-5" style="text-shadow: 1px 1px 5px black;font-weight: revert;">WELCOME</h1>
            <div class="d-flex justify-content-center">
                <a href="{{ url('/login') }}" type="button" class="btn btn-outline-secondary" style="text-shadow: 1px 1px 2px black; font-size: xx-Large;">Join Us!</a>
            </div>
        </div>
    </div>
</div>
@endsection