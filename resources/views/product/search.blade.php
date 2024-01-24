@extends('layouts.master')

@section('content')
    {{-- Carousel Section --}}
    <div class="custom-product">
        @foreach ($products as $index => $item)
            <div class="searched-item">
                <a href="/api/detail/{{ $item['id'] }}">
                    <img src="{{ $item->images->first()->path }}" class="d-block w-90" 
                         style="max-height: auto; object-fit: cover; margin-left:30%;">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 style="color: black; text-align: right">{{ $item->name }}</h2>
                        <p style="color: black; text-align: right">{{ $item->description }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <hr>
@endsection
