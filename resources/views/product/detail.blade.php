
@extends('layouts.master')

@section('content')
<hr>
<div class="container">
    <div class="row">
    <div  class="col-sm-6">
    <img src="{{ $product->images->first()->path}}" class="d-block w-100" alt=""
                style="max-height:auto; margin-left:03%;">
            
    </div> 
    <div  class="col-sm-6">
     <h1><a style="margin-left:20%" href="/api/product/show/">Go Back</a></h1><br><br>  
           <h2 style="margin-left:20%"> Name  : {{ $product->name }}</h2><br>

           <h2 style="margin-left:20%"> Category  : {{ $product->category->name }}</h2><br>

           <h4 style="margin-left:20%"> Price  : Rs {{ $product->price }}</h4><br>

           <h4  style="margin-left:20%"> Description  : {{ $product->description }}</h4><br>
            <br><br>
             
            <button class="btn btn-success">Add To cart</button>
            <br><br>
            <button class="btn btn-primary">Buy Now</button>
     
        </div>
    </div>
</div>
<hr>
@endsection
