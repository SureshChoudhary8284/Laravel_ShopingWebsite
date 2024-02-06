@extends('layouts.master')
@section('content')
                <div class="address-section">
                    <h2>Select a Shipping Address</h2>
                    @if(count($addresses) > 0)
                        <div class="address-grid">
                            @foreach($addresses as $address)
                                <div class="address-box">
                                    <div class="form-check">
                                        <input type="radio" name="default_address" {{ $address->is_default ? 'checked' : '' }}>                    
                                        <h5>{{ $address->user->name }}</h5>
                                        <p>{{ $address->street }}, {{ $address->city }}, {{ $address->state }}, {{ $address->country }}, {{ $address->zip }}</p>                     
                                        </label>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>No addresses found.</p>
                    @endif
                </div>
                        {{-- New Address Fields
                        <div class="new-address-fields">
                            <div class="form-group">
                                <label for="new_address">Enter New Address:</label>
                                <input type="text" class="form-control" id="new_address" name="new_address">
                            </div>
                            
                            <div class="form-group">
                                <label for="street">Street:</label>
                                <input type="text" name="street" id="street" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="City">City:</label>
                                <input type="text" name="City" id="City" class="form-control" required>
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
                        </div>

                        {{-- Your other form fields --}}
                        {{-- <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </div>
                </div>
            </div> --}}
          <!-- ... Your previous HTML code ... -->

        {{-- <div class="col-md-4">
            <div class="card"> 
            <div class="card-header">Price Detail</div>
            <div class="card-total" id="total-price">
                <p>Total Price: Rs.<span id="display-total-price">00</span></p><hr>
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
    </div>

    
@endsection
