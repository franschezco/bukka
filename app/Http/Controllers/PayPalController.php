<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use App\Models\Order; // Include Order Model
use Exception;

class PayPalController extends Controller
{
    private $client;

    public function __construct()
    {
        // Initialize PayPal Client
        $environment = new SandboxEnvironment(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'));
        $this->client = new PayPalHttpClient($environment);
    }

    // Handle Payment Request
    public function handleCardPayment(Request $httpRequest)
    {
        // Validate HTTP request data
        $httpRequest->validate([
            'meal' => 'required|array|min:1',
            'price' => 'required|array|min:1',
            'qty' => 'required|array|min:1',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $items = [];
        $total = 0;

        // Process order items
        foreach ($httpRequest->meal as $index => $meal) {
            $price = (float)$httpRequest->price[$index];
            $qty = (int)$httpRequest->qty[$index];
            $items[] = [
                'name' => $meal,
                'unit_amount' => [
                    'currency_code' => 'GBP',
                    'value' => number_format($price, 2)
                ],
                'quantity' => $qty
            ];
            $total += $price * $qty;
        }

        // Create PayPal Order
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'GBP',
                        'value' => number_format($total, 2),
                        'breakdown' => [
                            'item_total' => [
                                'currency_code' => 'GBP',
                                'value' => number_format($total, 2)
                            ]
                        ]
                    ],
                    'items' => $items
                ]
            ],
            'application_context' => [
                'cancel_url' => route('paypal.cancel'),
                'return_url' => route('paypal.success'),
            ]
        ];

        try {
            $response = $this->client->execute($request);
            foreach ($response->result->links as $link) {
                if ($link->rel === 'approve') {
                    // Store session data
                    session(['payment_data' => $httpRequest->input()]);
                    return redirect($link->href);
                }
            }
        } catch (Exception $ex) {
            \Log::error('PayPal Payment Error: ' . $ex->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    // Payment Success
   // Payment Success
public function paymentSuccess(Request $request)
{
    $token = $request->query('token'); // PayPal Token
    $captureRequest = new OrdersCaptureRequest($token);

    try {
        $response = $this->client->execute($captureRequest);

        if ($response->statusCode === 201) {
            $paymentData = session('payment_data'); // Retrieve stored session data

            // Save the order in the database
            foreach ($paymentData['meal'] as $index => $meal) {
                Order::create([
                    'name' => $paymentData['name'],
                    'phone' => $paymentData['phone'],
                    'address' => $paymentData['address'],
                    'location' => $paymentData['location'],
                    'paymenttype' => 'PayPal',
                    'meal' => $meal,
                    'qty' => $paymentData['qty'][$index],
                    'price' => $paymentData['price'][$index],
                    'status' => 'received',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Clear the cart
            \Cart::clear(); // Ensure the Cart package is configured properly

            // Clear session data
            session()->forget('payment_data');

            // Redirect to the order-received page
            return redirect('/order-received')->with('success', 'Payment successful and order received!');
        }
    } catch (Exception $ex) {
        return redirect('/')->with('error', 'Payment failed! Please try again.');
    }
}


    // Payment Cancel
    public function paymentCancel()
    {
        return redirect('/')->with('error', 'Payment canceled!');
    }
}
