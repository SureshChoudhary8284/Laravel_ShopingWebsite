<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function saveAddress(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'is_default' => 'boolean',
            'street' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|string',
            'address_option' => 'required|in:existing,new',
            'existing_address' => 'required_if:address_option,existing',
        ]);

        // Handle existing address
        if ($validatedData['address_option'] === 'existing') {
            // Process existing address (update or whatever is needed)
            // ...

            return redirect()->back()->with('success', 'Existing address updated successfully');
        }

        // Handle new address
        $newAddress = new Address();

        $newAddress->user_id = auth()->user()->id; // Assuming you are setting the user_id based on the authenticated user
        $newAddress->is_default = $validatedData['is_default'] ?? false;
        $newAddress->street = $validatedData['street'];
        $newAddress->city = $validatedData['city'];
        $newAddress->state = $validatedData['state'];
        $newAddress->country = $validatedData['country'];
        $newAddress->zip = $validatedData['zip'];
        $newAddress->save();

        return redirect()->route('product.checkout')->with('newAddress', $newAddress);
        // Alternatively, you can use view('product.checkout', ['newAddress' => $newAddress])
    }

    public function showAddress()
        {
            $addresses = Address::all(); 
            return view('product.checkout', ['addresses' => $addresses]);
        }


}
