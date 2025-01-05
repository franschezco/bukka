<?php

namespace App\Http\Controllers;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class HomeController extends Controller
{
    // Redirect based on user type
    public function redirects()
    {
        $usertype = Auth::user()->usertype;
    
        if ($usertype == '1') { // Admin
            $order = Order::all(); // Fetch all orders for admin
            return view('admin.dashboard', compact('order')); // Pass orders to admin dashboard
        } else { // Regular user
            $meal = Food::all(); // Fetch all meals for regular user
            return view('index', compact('meal')); // Pass meals to regular user view
        }
    }
    

    // Display home page
    public function index()
    {
        $meal = Food::all(); // Ensure it always returns a collection
        return view('index', compact('meal'));
    }

    // Logout user
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    // Add to cart
    public function addToCart(Request $request, $id)
{
    $product = Food::find($id);

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    \Cart::add([
        'id' => $id,
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => 1,
        'attributes' => [
            'image' => $product->image2,
        ]
    ]);

    return response()->json([
        'success' => 'Item added to cart!',
        'count' => \Cart::getTotalQuantity(),
    ]);
}

    // View cart
    public function viewcart()
    {
        return view('cart');
    }

    // Remove item from cart
    public function destroy($id)
    {
        try {
            Cart::remove($id); // Remove item from cart
            return back()->with('success', 'Item removed successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to remove item.');
        }
    }

    // Update cart item quantity
    public function updateCart(Request $request)
    {
        try {
            // Validate required fields
            $request->validate([
                'id' => 'required|string',
                'quantity' => 'required|integer|min:1|max:300',
            ]);
    
            // Update the cart item
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
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
    


    // Checkout page
    public function checkout()
    {
        return view('checkout');
    }

    // User profile page
    public function profile()
    {
        return view('profile');
    }

    // Receipt page
    public function receipt()
    {
        return view('order-received');
    }

    // View orders
    public function order()
    {
        // Get the currently authenticated user's name
        $user = Auth::user()->name;
    
        // Fetch **Active Orders** (status: 'received' or 'shipping')
        $mealorder = DB::table('orders')
            ->where('name', $user)
            ->whereIn('status', ['received', 'shipping']) // Corrected status
            ->orderBy('created_at', 'desc')
            ->get();
    
        // Fetch **Completed Orders** (status: 'delivered')
        $mealord = DB::table('orders')
            ->where('name', $user)
            ->where('status', 'delivered') // Corrected status
            ->orderBy('created_at', 'desc')
            ->get();
    
        // Return view with orders
        return view('order', compact('mealorder', 'mealord'));
    }
    

    // Order Tracking Logic
    public function tracking(Request $request)
    {
        // Get the created_at value passed from the form input
        $created = $request->input('created');

        // Fetch orders based on the created_at timestamp
        $meals = DB::table('orders')
            ->where('created_at', $created)
            ->get();

        // Pass meals and foods for displaying order details
        $foods = DB::table('orders')
            ->where('created_at', $created)
            ->get();

        // Return the view with required data
        return view('order-tracking', ['meal' => $meals, 'foods' => $foods]);
    }



public function handleCOD(Request $request)
{
    // Validate the request
    $request->validate([
        'meal' => 'required|array',
        'price' => 'required|array',
        'qty' => 'required|array',
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'location' => 'required|string|max:255',
    ]);

    // Save the orders
    foreach ($request->meal as $key => $meal) {
        Order::create([
            'meal' => $meal,
            'price' => $request->price[$key],                      // Price for each meal
            'qty' => $request->qty[$key],                          // Quantity for each meal
            'price' => $request->price[$key] * $request->qty[$key], // Calculate total price for each item
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'location' => $request->location,
            'paymenttype' => 'COD',                                // Payment type
            'TransactionId' => null,                               // COD doesn't need a transaction ID
            'status' => 'received',                                // Default status
            'created_at' => now(),                                 // Laravel timestamp
            'updated_at' => now(),
        ]);
    }

    // Clear the cart after saving orders
    Cart::clear();

    // Redirect to order-received page
    return redirect('order-received')->with('success', 'Order placed successfully!');
}

    
    public function handleCardPayment(Request $request)
    {
        // Validate request
        $request->validate([
            'meal' => 'required|array',
            'price' => 'required|array',
            'qty' => 'required|array',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);
    
        // Redirect to payment gateway page (Example: Flutterwave)
        return redirect('payment-gateway')->with('paymentData', $request->all());
    }
    
   
}
