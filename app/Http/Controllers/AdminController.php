<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;




class AdminController extends Controller
{

    public function dashboard()
    {
        // Fetch all orders from the database
        $order = orders::all(); // Query the 'orders' table
        
        // Pass the data to the 'admin.dashboard' view
        return view('admin.dashboard', compact('order')); // Use 'orders' as the key
    }

    public function orders()
    {
        // Fetch all orders from the database
        $order = orders::all(); // Query the 'orders' table
        
        // Pass the data to the 'admin.dashboard' view
        return view('admin.orders', compact('order')); // Use 'orders' as the key
    }
   

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function deleteusers($id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect()->back();
    }
    public function deleteOrder($id)
    {
        // Find the order by ID
        $order = Order::find($id);

        // Check if the order exists
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found!');
        }

        // Delete the order
        $order->delete();

        // Redirect with success message
        return redirect()->back()->with('success', 'Order deleted successfully!');
    }
    public function food()
    {
        // Fetch all meals from the database
        $meals = Food::all(); // Fixed variable name and model reference

        // Pass the meals to the view
        return view('admin.foods', compact('meals')); // Ensure the variable matches the view
    }

    public function upload(Request $request)
    {
        $data = new Food;

        // Handle first image
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image = $imagename;

        // Handle second image
        $image2 = $request->image2;
        $imagename2 = time() . '2.' . $image2->getClientOriginalExtension();
        $request->image2->move('foodimage', $imagename2);
        $data->image2 = $imagename2;

        $data->name = $request->name;
        $data->price = $request->price;
        $data->save();

        return redirect()->back()->with('status', 'Food Added to Menu');
    }

    public function user()
    {
        $data = User::all();
        return view("admin.users", compact("data"));
    }

    public function deletefood($id)
    {
        $meal = Food::find($id);
        $meal->delete();
        return redirect()->back()->with('deleted', 'Food Already Deleted');
    }

    public function updatefood($id)
    {
        $meal = Food::find($id);
        return view("admin.updatefood", compact("meal"));
    }

    public function updatemeal(Request $request, $id)
    {
        $meal = Food::find($id);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('foodimage', $imagename);
            $meal->image = $imagename;
        }

        $meal->name = $request->name;
        $meal->price = $request->price;
        $meal->save();

        return redirect()->back()->with('status', 'Food Updated Successfully');
    }
    public function grantedOrders()
    {
        // Fetch orders where status is 'granted'
        $orders = Order::where('status', 'granted')->get();

        // Pass orders to the view
        return view('admin.grantedorders', compact('orders')); // 'orders' is passed to the view
    }
}
