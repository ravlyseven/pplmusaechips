<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\Order_Detail;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    public function index()
    {
        if (Auth::user()->id == 1) 
        {
            $orders = Order::where('status', '!=', 0)->get();
        }
        else 
        {
            $orders = Order::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        }
        return view('history/index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->first();
        $order_details = Order_Detail::where('order_id', $order->id)->get();

        return view('history/show', compact('order', 'order_details'));
    }

    public function delete($id)
    {
        $order = Order::where('id', $id)->first();

        $order_details = Order_Detail::where('order_id', $order->id)->get();
        foreach ($order_details as $order_detail)
        {
            $product = Product::where('id', $order_detail->product_id)->first();
            $product->stock = $product->stock+$order_detail->quantity;
            $product->update();
            $order_detail->delete();
        }

        $order->delete();
        return redirect('history');
    }

    public function info($id)
    {
        $order = Order::where('id', $id)->first();
        return view ('history/edit', compact('order'));
    }
    
    
    public function update(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        $order_details = Order_Detail::where('order_id', $order->id)->get();

        if($request->hasFile('photo'))
        {
            if ($order->photo && file_exists(storage_path('app/public/'.$order->photo))) {
                Storage::delete('public', $order->photo);
            }
            $photo = $request->file('photo')->store('orders', 'public');
            $order->photo = $photo;
            $order->status = 2;
        }
        $order->update();
        return view('history/show', compact('order', 'order_details'));
    }
}
