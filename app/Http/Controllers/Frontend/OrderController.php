<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\UserAddress;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function checkout(Request $request)
    {
        return view('frontend.pages.checkout');
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'sub_district' => 'required',
            'district' => 'required',
            'postal_code' => 'numeric',
            'address' => 'required',
            'payment_method' => 'required',
        ]);
        DB::beginTransaction();
        $address = new UserAddress();
        $address->user_id = Auth::user()->id;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->phone_number = $request->phone_number;
        $address->district = $request->district;
        $address->postal_code = $request->postal_code;
        $address->address = $request->address;
        $address->save();

        $deliveryCharge = 50;
        $invoice = new Invoice();
        $invoice->invoice_no = 'VGF'.rand(5,15). Str::random(5);
        $invoice->user_id = auth()->user()->id;
        $invoice->address_id = $address->id;
        $invoice->total_price = Cart::priceTotal() + $deliveryCharge;
        $invoice->payment_method = 'COD';
        $invoice->payment_status = 'pending';
        $invoice->delivery_method = 'COD';
        $invoice->delivery_status = 'PLACED';
        $invoice->save();


        $cartContent = Cart::content();
        foreach ($cartContent as $cartItem) {
            $product = Product::find($cartItem->id);
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->address_id = $address->id;
            $order->product_id = $cartItem->id;
            $order->invoice_id = $invoice->id;
            $order->price = $cartItem->price;
            $order->quantity = $cartItem->qty;
            $order->weight = $product->weight;
            $order->weight_type = $product->weight_type;
            $order->order_status = 'pending';
            $order->save();
        }
        Cart::destroy();
        DB::commit();
        notyf()->success('Order placed successfully!.');
        return redirect()->route('order.complete',['invoiceNo'=>$invoice->invoice_no]);
    }
    public function orderComplete($invoiceNo){
        $invoice = Invoice::where('invoice_no',$invoiceNo)->first();
        if(!$invoice){
            abort(404);
        }
        return view('frontend.pages.order_complete',['invoice'=>$invoice]);
    }
}
