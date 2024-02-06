{{-- @extends('layouts.master')
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
@endsection --}}
