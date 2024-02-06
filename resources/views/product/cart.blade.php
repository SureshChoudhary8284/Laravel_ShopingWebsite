@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Shopping Cart</h1>
        @if($cartItems && count($cartItems) > 0)
           
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
                <form action="/api/checkout_order" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Place Order</button>
                </form>
                <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to remove this item?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmRemoveBtn">Remove</button>
                            </div>  
                        </div>
                    </div>
                </div>  
                <div class="text-end">
                    <strong>Total: Rs<span id="cart-total">{{ $item->quantity * $item->product->price  }}</span></strong>
                </div>
            </div>
        @else
            <p>Your shopping cart is empty.</p>
        @endif
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

        function confirmRemove(productId) {
            // Set the productId as a data attribute in the confirmation modal button
            document.getElementById('confirmRemoveBtn').dataset.productId = productId;

            // Show the confirmation modal
            const modal = new bootstrap.Modal(document.getElementById('confirmationModal'), { backdrop: 'static' });
            modal.show();
        }

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
    </script>
@endsection
