<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function updateCart(Request $request)
{
    try {
        // Validate Request
        $request->validate([
            'id' => 'required|string',
            'quantity' => 'required|integer|min:1|max:300',
        ]);

        // Update the Cart Item
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity,
            ],
        ]);

        // Return updated totals
        return response()->json([
            'success' => true,
            'subtotal' => number_format(\Cart::getSubTotal(), 2),
            'delivery' => number_format(\Cart::getConditions()->sum('value'), 2),
            'total' => number_format(\Cart::getTotal(), 2),
        ]);
    } catch (\Exception $e) {
        // Return error in JSON format
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}


    // Function to add an item to the cart
    public function addtocart(Request $request, $id)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string',
                'price' => 'required|numeric',
            ]);
    
            // Add item to the cart
            \Cart::add([
                'id' => $id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => 1,
                'attributes' => []
            ]);
    
            // Return JSON response
            return response()->json(['count' => \Cart::getTotalQuantity()], 200);
    
        } catch (\Exception $e) {
            // Handle error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}
 