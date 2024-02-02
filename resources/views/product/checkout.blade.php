@extends('layouts.master')

@section('content')
<div class="py-3 py-md-4 checkout">
    <div class="container">
        <h4>Checkout</h4>
        <hr>

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="shadow bg-white p-3">
                    <!-- Display Cart Items and Total -->
                    <h5>Your Cart:</h5>
                    <ul>
                        {{-- @foreach($cartItems as $item)
                        @if(is_object($item))
                            <li>{{ $item->product->name }} - Rs{{ $item->product->price }}</li>
                        @else
                            <li>Invalid item</li>
                        @endif
                    @endforeach --}}
                    </ul>
                    <div class="text-end">
                        <strong>Total: Rs</strong>
                    </div>
                    <hr>
                    <small>* Items will be delivered in 3 - 5 days.</small>
                    <br/>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="shadow bg-white p-3">
                    <h4 class="text-primary">
                        Basic Information
                    </h4>
                    <hr>
                    <form action="" method="POST">
                        @csrf
                        <!-- Your form fields go here -->
                        <div class="mb-3">
                            <label for="fullname">Full Name</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Enter Full Name" />
                        </div>
                        <!-- Add more form fields for phone, email, address, etc. -->

                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
