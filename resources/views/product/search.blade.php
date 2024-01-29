@extends('layouts.master')
@section('content')

<div class="searchbar">
    @foreach($products->chunk(3) as $productChunk)
        <div class="row justify-content-center"> {{-- Center the content horizontally --}}
            @foreach ($productChunk as $index => $item)
                <div class="col-sm-4 ml-16 items-center"> {{-- Add margin bottom to create space between products --}}
                    <div class="product"> 
                        <a href="/api/detail/{{ $item['id'] }}">
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

