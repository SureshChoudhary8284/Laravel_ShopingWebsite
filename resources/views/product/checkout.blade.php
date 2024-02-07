@extends('layouts.master')

@section('content')
    <div class="address-section">
        <h2>Select a Shipping Address</h2>
        <hr>
        @if(count($addresses) > 0)
            <div class="address-grid">
                @foreach($addresses as $address)
                <hr>
                    <a class="btn btn-primary" href="{{ route('product.address', ['id' => $address->id]) }}" role="button">Edit</a>
                    <div class="address-box">
                        <div class="form-check">
                            <div class="address-justify-center">
                                    <input type="radio" name="default_address" {{ $address->is_default ? 'checked' : '' }}>
                            </div> 
                            <h5>{{ $address->user->name }}</h5>
                            <p>{{ $address->street }}, {{ $address->city }}, {{ $address->state }}, {{ $address->country }}, {{ $address->zip }}</p>                     
                            <hr>
                        </div>  
                    </div>
                    
                @endforeach
            </div>
        @else
            <p>No addresses found.</p>
        @endif

        <button><a href="/api/product/address/">Add New Address</a></button>
    </div>
        {{-- Your other form fields --}}
        {{-- <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Confirm Order</button>
    </div>
</div>
</div> --}}
<!-- ... Your previous HTML code ... -->

{{-- <div class="col-md-4">
    <div class="card"> 
        <div class="card-header">Price Detail</div>
        <div class="card-total" id="total-price">
            <p>Total Price: Rs.<span id="display-total-price">00</span></p>
            <hr>
            <button onclick="updateTotalPrice()">Update Total Price</button>
        </div>
    </div>
</div> --}}

{{-- <script>
    function updateTotalPrice() {
        var totalamount = 100.00;
        document.getElementById('display-total-price').textContent = totalamount.toFixed(2);
    }
</script> --}}


</div>

@endsection
