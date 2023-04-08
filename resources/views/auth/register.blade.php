

@extends('auth.layouts.auth')

@section('title', 'register')

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{asset('assets/auth/images/img-01.png')}}" alt="IMG">
                </div>
    
                <form action="{{route('doRegister')}}" method="POST">
                    <span class="login100-form-title">
                        Register
                    </span>
    
    
                        @csrf
                        <div class="wrap-input100 validate-input" data-validate = "Name minimal 6 character">
                            <input class="input100 form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name" id="name">
                            @error('name')
                                <div id="nameHelp" class="form-text">{{ $message }}</div>
                            @enderror
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                            </span>
                        </div>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" id="email">
                        @error('email')
                            <div id="emailHelp" class="form-text">{{ $message }}</div>
                        @enderror
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
    
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100 form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Password">
                        @error('password')
                            <div id="passwordHelp" class="form-text">{{ $message }}</div>
                        @enderror
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Password must same">
                        <input class="input100 form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" id="password_confirmation" placeholder="Password Confirmation">
                        @error('password_confirmation')
                            <div id="passwordConfirmationHelp" class="form-text">{{ $message }}</div>
                        @enderror
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Register
                        </button>
                    </div>
                    
    
    
                    
                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{route('login')}}">
                            Have an account? Login
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection