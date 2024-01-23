@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">ECOMMERCE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Orders</a>
          </li>
        </ul>
        <div>
        <ul>
          {{-- @foreach ($categories as $category)
          <li>{{ $category->name }}</li>
          <li>{{ $category->parent_id }}</li>
      @endforeach --}}
      </ul>
    </div>
        <form class="d-flex" role="search" >
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div> 
     
      <div class="shopping-cart-button">
        <a href="cart.html" class="outline">View cart</a>
    </div>
    <div class="col-xl-3 col-lg-4">
      <div class="header-info header-info-right">
          <ul>                                
              <li><i class="fi-rs-key"></i><a href="login.html">Log In </a>  / <a href="register.html">Sign Up</a></li>
          </ul>
      </div>
  </div>
  </nav>

  <hr>

  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
       
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"  aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      @foreach ($products as $item)
          <div class="carousel-item {{ $item['id'] == 1 ? 'active' : '' }}">
              <img src="img/h4-slide4.png" class="d-block w-100" alt="alt1">
              <div class="carousel-caption d-none d-md-block">
                  <h2 style="color: black; text-align: right">{{ $item['name'] }}</h2>
                  <p style="color: black; text-align: right">{{ $item['description'] }}</p>
              </div>
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
@endsection
