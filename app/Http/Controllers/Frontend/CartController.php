<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->qty??1,
                'price' => $product->price,
                'weight' => $product->weight,
                'options' => [
                    'image' => $product?->image,
                    'weight_type' => $product?->weight_type,
                ]
            ]
        );
       //Cart::destroy();
        return response()->json(['success' => true, 'message' => 'Product added to the cart successfully.','cart_count'=>Cart::count()]);
    }
    public function cart()
    {

        $cart = Cart::content();
        if(!$cart->count()){
            return redirect()->route('home');
        }
        //return $cart;
        return view('frontend.pages.cart',compact('cart'));
    }
    //Cart Update
    public function updateQty(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
        $cart = Cart::get($request->rowId);
        return response()->json([
            'success' => true,
            'message' => 'Cart item updated successfully.',
            'cart_item_sub_total' => $cart->subtotal,
            'cart_sub_total' => Cart::priceTotal(),
            'cart_count' => Cart::count(),
            ]);
    }
    //Cart remove item
    public function removeItem(Request $request)
    {
        Cart::remove($request->rowId);
        return response()->json([
            'success' => true,
            'message' => 'Cart item remove successfully.',
            'cart_sub_total' => Cart::priceTotal(),
            'cart_count' => Cart::count()
        ]);
    }
}
