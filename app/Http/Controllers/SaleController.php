<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Product;
class SaleController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            try{
                $order->customer_name = Customer::find($order->customer_id)->username;
            }
            catch (\Exception $e){
                $order->customer_name = 'N/A';
            }
            try{
                $order->sales = Sale::where('order_id', $order->_id)->get();
            }
            catch (\Exception $e){
                $order->sales = [];
            }
            try{
                $order->order_details = OrderDetail::where('order_id', $order->_id)->get();
            }
            catch (\Exception $e){
                $order->order_details = [];
            }
            try{
                $order->product_name = Product::find($order->order_details[0]->product_id)->name;
            }
            catch (\Exception $e){
                $order->product_name = 'N/A';
            }
        }
        return response()->json([
            'data' => $orders,
            'status' => 200
        ]);
    }

    public function store(Request $request)
    {
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'total' => $request->total,
            'status' => $request->status,
        ]);
        $sale = Sale::create([
            'order_id' => $order->_id,
            'date' => $request->date,
            'total' => $request->total,
            'subtotal' => $request->subtotal,
        ]);
        $order_detail = OrderDetail::create([
            'order_id' => $order->_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);
        try{
            $order->customer_name = Customer::find($order->customer_id)->username;
        }
        catch (\Exception $e){
            $order->customer_name = 'N/A';
        }
        try{
            $order->sales = Sale::where('order_id', $order->_id)->get();
        }
        catch (\Exception $e){
            $order->sales = [];
        }
        try{
            $order->order_details = OrderDetail::where('order_id', $order->_id)->get();
        }
        catch (\Exception $e){
            $order->order_details = [];
        }
        try{
            $order->product_name = Product::find($order->order_details[0]->product_id)->name;
        }
        catch (\Exception $e){
            $order->product_name = 'N/A';
        }
        return response()->json([
            'data' => $order,
            'status' => 201
        ]);
    }

    public function show($id)
    {
        $order = Order::find($id);
        try{
            $order->customer_name = Customer::find($order->customer_id)->username;
        }
        catch (\Exception $e){
            $order->customer_name = 'N/A';
        }
        try{
            $order->sales = Sale::where('order_id', $order->_id)->get();
        }
        catch (\Exception $e){
            $order->sales = [];
        }
        try{
            $order->order_details = OrderDetail::where('order_id', $order->_id)->get();
        }
        catch (\Exception $e){
            $order->order_details = [];
        }
        try{
            $order->product_name = Product::find($order->order_details[0]->product_id)->name;
        }
        catch (\Exception $e){
            $order->product_name = 'N/A';
        }
        return response()->json([
            'data' => $order,
            'status' => 200
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order_detail = OrderDetail::where('order_id', $order->_id)->first();
        $sale = Sale::where('order_id', $order->_id)->first();
        $order->update([
            'customer_id' => $request->customer_id,
            'total' => $request->total,
            'status' => $request->status,
        ]);
        $sale->update([
            'order_id' => $order->_id,
            'date' => $request->date,
            'total' => $request->total,
            'subtotal' => $request->subtotal,
        ]);
        $order_detail->update([
            'order_id' => $order->_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);
        try{
            $order->customer_name = Customer::find($order->customer_id)->username;
        }
        catch (\Exception $e){
            $order->customer_name = 'N/A';
        }
        try{
            $order->sales = Sale::where('order_id', $order->_id)->get();
        }
        catch (\Exception $e){
            $order->sales = [];
        }
        try{
            $order->order_details = OrderDetail::where('order_id', $order->_id)->get();
        }
        catch (\Exception $e){
            $order->order_details = [];
        }
        try{
            $order->product_name = Product::find($order->order_details[0]->product_id)->name;
        }
        catch (\Exception $e){
            $order->product_name = 'N/A';
        }
        return response()->json([
            'data' => $order,
            'status' => 200
        ]);
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order_detail = OrderDetail::where('order_id', $order->_id)->first();
        $sale = Sale::where('order_id', $order->_id)->first();
        $order->delete();
        $order_detail->delete();
        $sale->delete();
        try{
            $order->customer_name = Customer::find($order->customer_id)->username;
        }
        catch (\Exception $e){
            $order->customer_name = 'N/A';
        }
        try{
            $order->sales = Sale::where('order_id', $order->_id)->get();
        }
        catch (\Exception $e){
            $order->sales = [];
        }
        try{
            $order->order_details = OrderDetail::where('order_id', $order->_id)->get();
        }
        catch (\Exception $e){
            $order->order_details = [];
        }
        try{
            $order->product_name = Product::find($order->order_details[0]->product_id)->name;
        }
        catch (\Exception $e){
            $order->product_name = 'N/A';
        }
        return response()->json([
            'data' => $order,
            'status' => 200
        ]);
    }
}
