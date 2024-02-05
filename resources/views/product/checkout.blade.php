@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
    <!-- Checkout Steps -->
    <section class="section-content bg padding-y">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Checkout</h2>
                </div>
            </div>

            <!-- User Authentication -->
            <div class="row mt-4">
                <div class="col-sm-12">
                    @auth
                        <p>Welcome, {{ auth()->user()->name }}!</p>
                    @else
                        <p>Guest Checkout: <a href="{{ route('login') }}">Login</a> | <a href="{{ route('register') }}">Register</a></p>
                    @endauth
                </div>
            </div>       
            <!-- Button to trigger modal -->

            <form action="route('checkout.confirm-personal-info') " method="POST" role="form">
                @csrf
                <!-- ... (existing personal information fields) ... -->

                <!-- Delivery Address Section -->
                <h3>Delivery Address</h3>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name ?? '' }}" required>
                </div>
                <div class="form-group">
                <label for="delivery_address">Address</label>
                    <input type="text" class="form-control" id="delivery_address" name="delivery_address" required>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="set_as_default" name="set_as_default">
                    <label class="form-check-label" for="set_as_default">Set as Default Address</label>
                </div>
                <div class="form-group">
                    <label for="delivery_city">City</label>
                    <input type="text" class="form-control" id="delivery_city" name="delivery_city" required>
                </div>

                <div class="form-group">
                    <label for="delivery_state">State</label>
                    <input type="text" class="form-control" id="delivery_state" name="delivery_state" required>
                </div>

               
                <div class="form-group">
                    <label for="delivery_zip">ZIP Code</label>
                    <input type="text" class="form-control" id="delivery_zip" name="delivery_zip" required>
                </div>

                <div class="form-group">
                    <label for="delivery_country">Country</label>
                    <input type="text" class="form-control" id="delivery_country" name="delivery_country" required>
                </div>
 
                <button type="submit" class="btn btn-primary">Save Address</button>
            </form>
</div>


              












            <!-- Order Summary -->
             {{-- <div class="row mt-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th class="col-1">Quantity</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems ?? [] as $order)
                            @if(is_object($order))
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->product->price }}</td>
                                    <td>
                                        <div class="input-group mb-2" style="margin-left:20%">
                                            <div class="input-group-prepend">
                                                <input
                                                    type="number"
                                                    class="form-control quantity-input"
                                                    value="{{ optional($item->cart)->quantity }}"
                                                    data-product-id="{{ $item->id }}"
                                                    data-product-price="{{ $item->product->price }}"
                                                    min="1"
                                                    max="10"
                                                />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price">{{ $item->quantity * $item->product->price }}</td>
                                    <td>
                                        <form id="removeForm_{{ $item->id }}" method="POST" action="{{ route('product.cart', ['id' => $item->id]) }}">
                                            @csrf
                                            <button type="button" class="btn btn-danger btn-remove" onclick="confirmRemove('{{ $item->id }}')">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4">Invalid data found in cart</td>
                                </tr>
                            @endif
                        @endforeach
                        
                        </tbody>
                    </table>
    
                    <div class="text-end">
                        <strong>Total: Rs<span id="cart-total">{{ $cartItems->total_amount }}</span></strong>
                    </div>
        </div>
        <script>
           document.querySelectorAll('.quantity-input').forEach(function (input) {
                input.addEventListener('input', function () {
                    const quantity = this.value;
                    const price = this.dataset.productPrice;
                    const totalCell = this.closest('tr').querySelector('.total-price');
                    totalCell.textContent = (quantity * price).toFixed(2);
    
                    // Update cart total after quantity change
                    updateCartTotal();
                });
            });
    
            document.querySelectorAll('.quantity-decrement').forEach(function (button) {
                button.addEventListener('click', function () {
                    const input = this.closest('.input-group').querySelector('.quantity-input');
                    if (input.value > input.min) {
                        input.value = parseInt(input.value) - 1;
                        input.dispatchEvent(new Event('input'));
                    }
                });
            });
    
            document.querySelectorAll('.quantity-increment').forEach(function (button) {
                button.addEventListener('click', function () {
                    const input = this.closest('.input-group').querySelector('.quantity-input');
                    if (input.value < input.max) {
                        input.value = parseInt(input.value) + 1;
                        input.dispatchEvent(new Event('input'));
                    }
                });
            });
    
    
            document.getElementById('confirmRemoveBtn').addEventListener('click', function () {
                const productId = this.dataset.productId;
                const removeForm = document.getElementById('removeForm_' + productId);
    
                // Submit the form to remove the item
                removeForm.submit();
    
                // Close the modal
                const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                modal.hide();
    
                // Update cart total after removal
                updateCartTotal();
            });
    
            function updateCartTotal() {
                let total = 0;
                document.querySelectorAll('.total-price').forEach(function (totalCell) {
                    total += parseFloat(totalCell.textContent);
                });
                document.getElementById('cart-total').textContent = total.toFixed(2);
            }
        </script> --}}
     </div>
            </div>

            <!-- Payment -->
            {{-- <div class="row mt-4">
                <div class="col-sm-12">
                    <!-- Display payment options -->
                    <form action="route('checkout.process-payment') " method="POST" role="form">
                        @csrf
                        <!-- Payment fields -->
                        <!-- ... (payment fields) ... -->
                        <button type="submit" class="btn btn-success">Process Payment</button>
                    </form>
                </div>
            </div> --}}
        </div>
    </section>
@endsection
