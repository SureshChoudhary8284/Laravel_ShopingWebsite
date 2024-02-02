@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Shopping Cart</h1>
        @if($cartItems && count($cartItems) > 0)
        <form method="GET" action="{{ route('product.cart') }}">
                @csrf
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
                        @foreach($cartItems as $item)
                            @if(is_object($item))
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->product->price }}</td>
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
                                         <button type="submit" class="btn btn-danger btn-remove" name="id" value="{{ $item->id }}">Remove</button>
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
            </form>

            {{-- <form action="{{ route('product.checkout') }}" method="POST"> --}}
            <form action="/api/checkout_order" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Place Order</button>
            </form>
            

            <div class="text-end">
                <strong>Total: Rs<span id="cart-total">{{ $total }}</span></strong>
            </div>
            <script>
                document.querySelectorAll('.quantity-input').forEach(function (input) {
                    input.addEventListener('input', function () {
                        const quantity = this.value;
                        const price = this.dataset.productPrice;
                        const totalCell = this.closest('tr').querySelector('.total-price');
                        totalCell.textContent = (quantity * price).toFixed(2);
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
            
                document.querySelectorAll('.btn-remove').forEach(function (button) {
                    button.addEventListener('click', function () {
                        const row = this.closest('tr');
                        row.parentNode.removeChild(row);
                        updateCartTotal();
                    });
                });
            
                function updateCartTotal() {
                    let total = 0;
                    document.querySelectorAll('.total-price').forEach(function (totalCell) {
                        total += parseFloat(totalCell.textContent);
                    });
                    document.getElementById('cart-total').textContent = total.toFixed(2);
                }
            </script>
            
            
        @else
            <p>Your shopping cart is empty.</p>
        @endif
    </div>
@endsection
