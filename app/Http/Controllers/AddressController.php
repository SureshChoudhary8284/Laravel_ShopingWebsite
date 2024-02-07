<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function address(Request $request) {
            $user = auth()->user();

            $addresses = new Address();
            $addresses->user_id = $user->id; 
            $addresses->is_default = $request->input('is_default', false);
            $addresses->street = $request->input('street');
            $addresses->city = $request->input('city');
            $addresses->state = $request->input('State');
            $addresses->country = $request->input('Country');
            $addresses->zip = $request->input('Zip');
            $addresses->save();
    
            return redirect('/api/checkout/details/');
        } 

    public function showAddress()
        {
            $addresses = Address::all(); 
            return view('product.checkout', ['addresses' => $addresses]);
        }


    public function newaddress()
    {
        return view('product.address');
    }

}
