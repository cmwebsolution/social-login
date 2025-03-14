@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @guest
                        <h1>{{ __('Welcome to our application!') }}</h1>
                    @else
                        <h1>{{ __('Hello,').''. Auth::user()->name }}</h1>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
