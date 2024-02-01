@extends('layouts.master')

@section('content')
<hr>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{ $product->images->first()->path }}" class="d-block w-100" alt=""
                style="max-height:auto; margin-left:03%;">
            <br>
            <form action="/api/carts" method="POST">
                @csrf
                @if(auth()->check())
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                @else
                    <!-- Handle the case when the user is not authenticated -->
                    <input type="hidden" name="user_id" value="{{ null }}"> 
                @endif
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-success m-2">Add To Cart</button>
            </form>
            
            
            
            <a href="">
                 <button class="btn btn-primary ml-3">Buy Now</button>
            </a>
        </div> 
        <div class="col-sm-6">
            <h3><a style="margin-left:80% " href="/api/home">Go Back</a></h3><br><br>  
            <h2 style="margin-left:20%"> Name  : {{ $product->name }}</h2><br>
            <h2 style="margin-left:20%"> Category  : {{$product->Category->name }}</h2><br> 
            <h4 style="margin-left:20%"> Price  : Rs {{ $product->price }}</h4><br>
            <h4  style="margin-left:20%"> Description  : {{ $product->description }}</h4><br>
            <br>
{{--             
            <div class="input-group mb-2" style="margin-left:20%">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-body-secondary" id="quantity-addon">Qty</span>
                    <input type="number" class="form-control" aria-describedby="quantity-addon" value="1" min="1">
                </div>
            </div> --}}
    </div>

</div>
<hr>
@endsection
