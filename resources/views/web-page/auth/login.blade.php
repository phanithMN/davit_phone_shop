@extends('layout.app-auth')
@section('title') {{'Login'}} @endsection
@section('content-auth')
   <!-- Content -->
   <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                         <!-- Logo -->
                         <div class="app-brand justify-content-center">
                            <a href="#" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bolder">Login</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Welcome to Login! 👋</h4>
                        <p class="mb-4">Please sign-in to your account and start the adventure</p>
                        <form method="POST" action="{{ route('customer.login.submit') }}" class="mb-3">
                            @csrf
                            <div class="mb-3 form-password-toggle">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary d-grid w-100">Sign In</button>
                        </form>
                        <p class="text-center">
                            <span>New on our platform?</span>
                            @if (Route::has('register'))
                                <a href="{{route('customer.register')}}">
                                    <span> Create a account </span>
                                </a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
