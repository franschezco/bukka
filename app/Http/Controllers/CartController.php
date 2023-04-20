<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addtocart(Request $request,$id){
$product_id = $request->id;
$product = $request->title;
$quantity = 1;
$price = $request->price;
        Cart::add($product_id, $product, $quantity, $price);

    return redirect('/shopping-cart')->with('success_message', 'Item was added to your cart!');



    }

    public function addcart()
    {

        return view("shopping-cart");
    }
}
