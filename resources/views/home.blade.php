@extends('layouts.master')
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

{{-- Carousel Section --}}
<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-inner">
        @foreach ($products as $index => $item)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
              <a href="/api/detail/{{ $item['id']}}">
                @if ($item->images && $item->images->isNotEmpty() && $item->images->first())
                  <img src="{{ $item->images->first()->path }}" class="d-block w-90" alt="{{ $item->name }}"
                  style="max-height: auto; object-fit: cover; margin-left:30%;">
                @endif
                <div class="carousel-caption d-none d-md-block">
                  <h2 style="color: black; text-align: right">{{ $item->name }}</h2>
                  <p style="color: black; text-align: right">{{ $item->description }}</p>
                </div>
              </a>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
  </div>
      <hr>
    {{-- Product Display Section --}}
    <table align="center">
        @foreach($products->chunk(3) as $productRow)
            <tr>
                @foreach($productRow as $product)
                        <td style="width: 300px; padding: 8px; border: 1px solid #ccc; text-align: center;">
                            <div>
                                @foreach($product->images ?? [] as $image)
                                    <a href="/api/detail/{{ $product->id }}">
                                        @if ($image)
                                            <img src="{{ $image->path }}" style="max-width: 200px; height: auto;">
                                            <hr>
                                        @endif
                                    </a>                             
                                <h4>Name: {{ $product->name }}</h4>
                                <h5>Price: Rs.{{ $product->price }}</h5>
                                @endforeach
                            </div>
                        </td>
                 
                @endforeach
            </tr>
        @endforeach
    </table>
    <hr>
@endsection
