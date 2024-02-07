@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h3 style="font-weight: bold;">Update Address:</h3>
        <div class="col-md-6 border p-4">
            @auth
          <form method="POST" action="{{ route('product.checkout', ['id' => $address->id]) }}">
                @csrf 
           
                <div class="form-group">
                    <label for="user_id">User ID</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}" readonly>
                </div>

                <div class="form-group">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control" value="{{ $address->street }}" required>
                </div>
            
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ $address->city }}" required>
                </div>
            
                <div class="form-group">
                    <label for="state">State:</label>
                    <input type="text" name="state" id="state" class="form-control" value="{{ $address->state }}" required>
                </div>
            
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" name="country" id="country" class="form-control" value="{{ $address->country }}" required>
                </div>
            
                <div class="form-group">
                    <label for="zip">Zip:</label>
                    <input type="text" name="zip" id="zip" class="form-control" value="{{ $address->zip }}" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Edit Address</button>
                </div>
            </form>
            @else
            <p>Please log in to access this feature.</p>
            @endauth
        </div>
    </div>
</div>

@endsection
