<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use  Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Orders;
use App\Models\requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class HomeController extends Controller
{
    public function redirects()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.dashboard');
        } else {
            $meal = food::all();
            return view('index', compact("meal"));
        }
    }
    public function index()
    {
        $meal = food::all();
        return view("index", compact("meal"));
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function addToCart($id)
    {
        $product = food::find($id);

        $name = $product->name;
        $quantity = 1;
        $price = $product->price;
        $image = $product->image;


        Cart::add(['id' => $id, 'name' => $name, 'qty' => 1, 'price' => $price, 'options' => ['image' => $image]]);
        return redirect()->back()->with('success', 'Meal added to cart successfully!');
    }

    public function viewcart()
    {
        return view("cart");
    }

    public function destroy($id)
    {
        $cart = Cart::content()->where('rowId', $id);
        if ($cart->isNotEmpty()) {
            Cart::remove($id);

            return back();
        } else {
            return view("shopping-cart");
        }
    }
    public function update(Request $request)
    {
        $rowId = $request->id;
        $quantity = $request->quantity;
        Cart::update($rowId, ['qty' => $quantity]);
        return back();
    }

    public function checkout()
    {

        return view('checkout');
    }
    public function profile()
    {

        return view('profile');
    }
    public function receipt()
    {

        return view('order-received');
    }
    public function order()
    {
        $user= Auth::user()->name;
        $mealorder=DB::table('requests')
        ->select('*')
        ->where('name',$user)
        ->where('status','=', 'ORDERED')
        ->orwhere('name',$user)
        ->where('status','=', 'SHIPPING')
        ->get();

        $mealord=DB::table('requests')
        ->select('*')
        ->where('name',$user)
        ->where('status','=', 'delivered')
        ->get();



        return view('order', compact('mealord','mealorder'));

    }

    public function tracking(Request $request)
    { $user=Auth::user()->name;
        $created=$request->created;
        $meal=DB::table('requests')
        ->select('*')
        ->where('name',$user)
        ->where('created_at','=', $created)
        ->get();


        $foods=DB::table('orders')
        ->select('*')
        ->where('name',$user)
        ->where('created_at','=', $created)
        ->get();
        return view('order-tracking', compact('meal','foods'));
    }


    public function checkouts(Request $request)
    {

        $paymenttype = $request->check;
        if ($paymenttype == 'Pay On Delivery') {
            foreach ($request->meal as $key => $meal) {
                $data = new Orders;
                $data->meal = $meal;
                $data->price = $request->price[$key];
                $data->qty = $request->qty[$key];
                $data->name = $request->name;
                $data->phone = $request->phone;
                $data->address = $request->address;
                $data->location = $request->location;
                $data->paymenttype = 'Pay On Delivery';
                $data->date = Carbon::today()->format('d-m-y');;
                $data->amount =  Cart::total();
                $data->save();
            }


            $data = new requests;
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->location = $request->location;
            $data->paymenttype = $request->paymenttype;
            $data->date = Carbon::today()->format('d-m-y');;
            $data->amount =  Cart::total();
            $data->status = "ORDERED";
            $data->save();

            Cart::destroy();
            return redirect('order-received');
        } elseif ($paymenttype == 'Pay On Flutterwave') {
            $reference = Flutterwave::generateReference();

            // Enter the details of the payment
            $data = [
                'payment_options' => 'card,banktransfer',
                'amount' => Cart::total(),
                'email' => Auth::user()->email,
                'tx_ref' => $reference,
                'currency' => "NGN",
                'redirect_url' => route('callback'),
                'customer' => [
                    'email' => 'frankojarkarta@gmail.com',
                    "phone_number" => request()->phone,
                    "name" => request()->name
                ],

                "customizations" => [
                    "title" => 'Food Ordered',
                    "description" => ""
                ]
            ];

            $payment = Flutterwave::initializePayment($data);


            if ($payment['status'] !== 'success') {
                // notify something went wrong
                return;
            } else {

                foreach ($request->meal as $key => $meal) {
                    $data = new Orders;
                    $data->meal = $meal;
                    $data->price = $request->price[$key];
                    $data->qty = $request->qty[$key];
                    $data->name = $request->name;
                    $data->phone = $request->phone;
                    $data->address = $request->address;
                    $data->location = $request->location;
                    $data->paymenttype = 'Card';
                    $data->date = "date(Y-m-d)";
                    $data->amount =  Cart::total();
                }
                $data = new requests;
                $data->name = $request->name;
                $data->phone = $request->phone;
                $data->address = $request->address;
                $data->location = $request->location;
                $data->paymenttype = $request->paymenttype;
                $data->date = "date(Y-m-d)";
                $data->amount =  Cart::total();
                $data->status = "recieved";
                $data->save();

                $data->save();
                Cart::destroy();
            };
            return redirect($payment['data']['link']);
        }
    }
    public function callback()
    {

        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {

            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);


            return redirect('order-received');
        } elseif ($status ==  'cancelled') {
            //Put desired action/code after transaction has been cancelled here
        } else {
            //Put desired action/code after transaction has failed here
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}
