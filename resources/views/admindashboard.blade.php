@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('error'))
            <div class="alert alert-success" role="alert">
                {{ session('error') }}
            </div>  
            @endif
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                       <h2>Welcome to Admin Dashboard</h2> 
                    {{-- {{ __('You are logged in Admin Dashboard!') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
