<?php

namespace App\Http\Controllers\Api\Customers;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $soldToParty = $request->get('sold');
        $customer = Customer::with('sales')
            ->when(isset($soldToParty) && !empty($soldToParty), function ($query) use ($soldToParty) {
                return $query->where('sold_to_party', $soldToParty);
            })->get();

        return CustomerResource::collection($customer);
    }

    public function show($id)
    {
        $customer = Customer::with(['sales', 'warehouses', 'units'])
            ->where('sold_to_party', $id)
            ->get();

        if (count($customer) > 0) {
            return $customer;
        }
       
        return response()->json(['message' => 'data tidak di temukan']);
    }
}
