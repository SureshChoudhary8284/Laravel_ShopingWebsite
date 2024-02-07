@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h3> * Add New Address:</h3>
        <div class="col-md-6 border p-4">
            @auth
            <form method="POST" action="/api/checkout/saveaddress"> 
                @csrf
                <div class="form-group">
                    <label for="Name">userId</label>
                    <input type="text" class="form-control" id="Name" name="Name" value="{{ auth()->user()->id }}">
                </div>

 
                <div class="form-group">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="delivery_city">City</label>
                    <input type="text" class="form-control" id="delivery_city" name="city" required>
                </div>
            
                <div class="form-group">
                    <label for="State">State:</label>
                    <input type="text" name="State" id="State" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="Country">Country:</label>
                    <input type="text" name="Country" id="Country" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="Zip">Zip:</label>
                    <input type="text" name="Zip" id="Zip" class="form-control" required>
                </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save Address</button>
                </div>
            </form>
            @else
            <p>Please log in to access this feature.</p>
        @endauth
       </div>
    </div>
</div>

@endsection
