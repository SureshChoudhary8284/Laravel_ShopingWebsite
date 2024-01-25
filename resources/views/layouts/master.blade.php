<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('master.name', 'ECOMMERCE') }}</title>

    
    <!-- Bootstrap CSS -->

     <link rel="stylesheet" href="/master.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Scripts -->
</head>
<body>
    <div id="master">
        {{-- navbar --}}
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
         <div class="container-fluid">
          <a class="navbar-brand" href="/api/product/show/" style="display: flex; align-items: center;">
            <img src="/img/shoplogo.jpeg" alt="Logo" style="max-width: 100px; height: auto; border-radius:40%">
        </a>
        
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/api/product/show/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Orders</a>
        </li>
      </ul>
      <div class="container center-form">
        <form action="/api/product/search" class="d-flex">
            <input name="query" class="form-control me-2 wider-input" type="search" placeholder="Search-bar" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    </div> 
          <ul class="navbar-nav ml-auto">           
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Login
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Profile</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Logout</a>
                  </div>
              </li>
          </ul>
 
  </div>
    <div class="col-xl-2 col-lg-9">
      <div class="shopping-cart-button">
        <a href="cart.html" class="outline">Cart(0)</a>
      </div>
      
   </nav>
   <hr>

   <div class="btn-group">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
    Electronic
  </button>
  <ul class="dropdown-menu" aria-labelledby="defaultDropdown">
    <li><a class="dropdown-item" href="/api/product/search/{{ $item['parent_id'] }}">Mobile</a></li>
    <li><a class="dropdown-item" href="#">Computer</a></li>
    <li><a class="dropdown-item" href="#">Laptop</a></li>
  </ul>
</div>

  <div class="btn-group">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuClickableOutside" data-bs-toggle="dropdown" data-bs-auto-close="inside" aria-expanded="false">
      Dresses
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableOutside">
      <li><a class="dropdown-item" href="#">Shirt</a></li>
      <li><a class="dropdown-item" href="#">Jens</a></li>
    </ul>
  </div>

   <hr>
  
        <main class="py-4">
            @yield('content')
        </main>
    </div>  
    <footer class="bg-body-tertiary text-center">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a
            data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #3b5998;"
              href="#!"
              role="button"
              ><i class="fab fa-facebook-f"></i
            ></a>
      
            <!-- Twitter -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #55acee;"
              href="#!"
              role="button"
              ><i class="fab fa-twitter"></i
            ></a>
      
            <!-- Google -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #dd4b39;"
              href="#!"
              role="button"
              ><i class="fab fa-google"></i
            ></a>
      
            <!-- Instagram -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #ac2bac;"
              href="#!"
              role="button"
              ><i class="fab fa-instagram"></i
            ></a>
      
            <!-- Linkedin -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #0082ca;"
              href="#!"
              role="button"
              ><i class="fab fa-linkedin-in"></i
            ></a>
            <!-- Github -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #333333;"
              href="#!"
              role="button"
              ><i class="fab fa-github"></i
            ></a>
          </section>
          <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
       
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
          <a class="navbar-brand" href="/api/product/show/" style="display: flex; align-items: center;">
            <img src="/img/shoplogo.jpeg" alt="Logo" style="max-width: 100px; height: auto; border-radius:40%">
        </a>
          © 2024 Copyright:
          <a class="text-body" href="https:choudhary.com/">choudhary@.com</a>
        </div>
        <!-- Copyright -->
      </footer>
     <hr>
</body>
</html>
