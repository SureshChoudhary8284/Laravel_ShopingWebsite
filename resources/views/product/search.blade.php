@extends('layouts.master')
@section('content')

<div class="searchbar">
    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach ($productChunk as $index => $item)
                <div class="col-sm-4">
                    <div class="product">
                        <a href="/product/search/{{ $item->id }}">
                        <img src="{{ $item->images->first()->path }}" style="max-width: 100%; height: auto;">
                        <h4>Name: {{ $item->name }}</h4>
                        <h5>Price: Rs.{{ $item->price }}</h5>
                        <p>Description: {{ $item->description }}</p>   
                    </a>                    
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

@endsection
