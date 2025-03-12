@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <hr width="45%">
                            <p class="w-auto">OR</p>
                            <hr width="45%">
                        </div>
                        <div class="d-block text-center m-2">
                            <a href="{{ route('client.login.provider', ['provider' => 'google']) }}" class="btn border w-50">
                                <svg fill="#434343" width="1em" height="1em" viewBox="0 0 24 24" font-size="24px">
                                    <path fill="#4285F4" d="M21 12.21c0-.622-.05-1.25-.159-1.862h-8.66v3.53h4.96a4.244 4.244 0 0 1-1.836 2.787v2.291h2.959C20 17.359 21 15.001 21 12.211"></path>
                                    <path fill="#34A853" d="M12.181 21.17c2.476 0 4.565-.812 6.086-2.214l-2.958-2.291c-.824.56-1.886.876-3.124.876-2.396 0-4.427-1.614-5.155-3.784H3.977v2.362a9.184 9.184 0 0 0 8.204 5.05"></path>
                                    <path fill="#FBBC04" d="M7.026 13.757a5.485 5.485 0 0 1 0-3.51V7.885h-3.05a9.166 9.166 0 0 0 0 8.234z"></path>
                                    <path fill="#EA4335" d="M12.181 6.46a4.993 4.993 0 0 1 3.522 1.374l2.621-2.618a8.83 8.83 0 0 0-6.143-2.385 9.18 9.18 0 0 0-8.204 5.054l3.05 2.362C7.751 8.073 9.785 6.46 12.18 6.46"></path>
                                </svg>
                                Continue with Google
                            </a>
                        </div>
                        <div class="d-block text-center m-2">
                            <a href="{{ route('client.login.provider', ['provider' => 'facebook']) }}" class="btn border w-50">
                                <svg fill="#434343" width="1em" height="1em" viewBox="0 0 24 24" font-size="24px">
                                    <path fill="#0866FF" d="M22 12.062C22 6.508 17.52 2 12 2S2 6.508 2 12.062c0 5.026 3.656 9.192 8.445 9.938v-7.036H7.89v-2.902h2.554V9.845c0-2.519 1.483-3.918 3.77-3.918 1.09 0 2.224.208 2.224.208V8.59h-1.257c-1.246 0-1.637.787-1.637 1.575v1.886h2.78l-.442 2.901h-2.338v7.037c4.8-.735 8.456-4.901 8.456-9.927"></path>
                                    <path fill="#fff" d="M10.445 22v-7.036H7.89v-2.902h2.554V9.845c0-2.519 1.483-3.918 3.77-3.918 1.09 0 2.224.208 2.224.208V8.59h-1.257c-1.246 0-1.637.787-1.637 1.575v1.886h2.78l-.442 2.901h-2.338v7.037l-3.1.01Z"></path>
                                </svg>
                                Continue with Facebook
                            </a>
                        </div>
                        <div class="d-block text-center m-2">
                            <a href="{{ route('client.login.provider', ['provider' => 'github']) }}" class="btn border w-50">
                                <svg height="1.5em" viewBox="0 0 24 24" width="1.5em">
                                    <path d="M12.5.75C6.146.75 1 5.896 1 12.25c0 5.089 3.292 9.387 7.863 10.91.575.101.79-.244.79-.546 0-.273-.014-1.178-.014-2.142-2.889.532-3.636-.704-3.866-1.35-.13-.331-.69-1.352-1.18-1.625-.402-.216-.977-.748-.014-.762.906-.014 1.553.834 1.769 1.179 1.035 1.74 2.688 1.25 3.349.948.1-.747.402-1.25.733-1.538-2.559-.287-5.232-1.279-5.232-5.678 0-1.25.445-2.285 1.178-3.09-.115-.288-.517-1.467.115-3.048 0 0 .963-.302 3.163 1.179.92-.259 1.897-.388 2.875-.388.977 0 1.955.13 2.875.388 2.2-1.495 3.162-1.179 3.162-1.179.633 1.581.23 2.76.115 3.048.733.805 1.179 1.825 1.179 3.09 0 4.413-2.688 5.39-5.247 5.678.417.36.776 1.05.776 2.128 0 1.538-.014 2.774-.014 3.162 0 .302.216.662.79.547C20.709 21.637 24 17.324 24 12.25 24 5.896 18.854.75 12.5.75Z"></path>
                                </svg>
                                Continue with Github
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
