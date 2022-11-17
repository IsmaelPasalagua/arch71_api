<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json([
            'data' => $customers,
            'status' => 200
        ]);
    }

    public function store(Request $request)
    {
        $customer = Customer::create($request->all());
        return response()->json([
            'data' => $customer,
            'status' => 201
        ]);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return response()->json([
            'data' => $customer,
            'status' => 200
        ]);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->update($request->all());
        return response()->json([
            'data' => $customer,
            'status' => 200
        ]);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json([
            'data' => $customer,
            'status' => 200
        ]);
    }

    public function search(Request $request)
    {
        $customers = Customer::where('username', 'like', '%' . $request->username . '%')->get();
        if (count($customers) == 0) {
            return response()->json([
                'data' => 'Not Found',
                'status' => 404
            ]);
        }
        return response()->json([
            'data' => $customers,
            'status' => 200
        ]);
    }
}
