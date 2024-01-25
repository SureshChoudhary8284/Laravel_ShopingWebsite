@extends('layouts.master')
@section('content')
{{-- <div class="categoryid">
    @foreach($categories as $category)
        <a href="{{ url('/categories', $category->id) }}">{{ $category->name }}</a>
    @endforeach

    <div class="row">
        @foreach($products->chunk(3) as $productChunk)
            @foreach ($productChunk as $index => $item)
                <div class="col-sm-4">
                    <div class="categoryid">
                        <a href="/categories/{{ $item->id }}">
                            @if ($item->images->isNotEmpty() && $item->images->first())
                            <img src="{{  $item->images->first()->path }}" style="max-width: 100%; height: auto;">
                            <h4>Name: {{ $item->name }}</h4>
                            <h5>Price: Rs.{{ $item->price }}</h5>
                            <p>Description: {{ $item->description }}</p>  
                            @endif 
                        </a>                    
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div> --}}



<select id="categoryDropdown">
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>

<div id="productDetails"></div>
@endsection