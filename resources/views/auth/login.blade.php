@extends('layouts.guest')

@section('main-content')
<h1 class="text-center text-primary text-uppercase">login</h1>
    <div class="row">
        <div class="col-6 mx-auto mt-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf
        
                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">
                        Email
                    </label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="form-label">
                        Password
                    </label>
                    <input type="password" class="form-control id="password" name="password">
                </div>
        
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>
                </div>
        
                <div class="d-flex flex-column items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
        
                    <button type="submit" class="btn btn-primary mt-2">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
