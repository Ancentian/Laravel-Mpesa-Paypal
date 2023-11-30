<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Paypal;

class PayPalPaymentController extends Controller
{
    public function index()
    {
        return view('paypal.index');
    }
    public function handlePayment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        
        $response = $provider->createOrder([     
        'intent' => 'CAPTURE',
        'purchase_units' => [
            [
                'amount' => [
                    'currency_code' => 'USD',
                    'value' => $request->price
                    ]
                    ]
                ],
                'application_context' => [
                    'return_url' => route('payment.success'),
                    'cancel_url' => route('payment.cancel'),
                ], 
            ]);
            //dd($response);
            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }
            }else {
                return redirect()->route('payment.cancel');
            }
    }
            
    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        //dd($response);
        if(isset($response['status']) && $response['status'] == 'COMPLETED') {
            
        $paypal_transaction = [
            'Transaction_id' => $response['id'],
            'status' => $response['status'],
            'payer_name' => $response['purchase_units'][0]['shipping']['name']['full_name'],
            'email' => $response['payer']['email_address'],
            'payer_id' => $response['payer']['payer_id'],
            'payer_country_code' => $response['purchase_units'][0]['shipping']['address']['country_code'],
            'reference_id' => $response['purchase_units'][0]['reference_id'],
            'payment_id' => $response['purchase_units'][0]['payments']['captures'][0]['id'],
            'payment_status' => $response['purchase_units'][0]['payments']['captures'][0]['status'],
            'currency_code' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'],
            'amount' => $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
            'paypal_fee' => $response['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['paypal_fee']['value'],
            'net_amount' => $response['purchase_units'][0]['payments']['captures'][0]['seller_receivable_breakdown']['net_amount']['value'],
        ];
        Paypal::create($paypal_transaction);
        return response()->json([
            'success' => true,
            'message' => 'Payment success',
        ]);
        }else {
            return redirect()->route('payment.cancel');
        }
    }

    public function paymentCancel()
    {
        dd('Your payment has been declined. The payment cancelation page goes here!');
    }
}