<?php

namespace App\Http\Controllers;

use Omnipay\Omnipay;
use Illuminate\Http\Request;
use App\Models\PaypalPayment;

class PaypalPaymentController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {

            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $payment = new PaypalPayment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save();

                return "Payment is Successfull. Your Transaction Id is : " . $arr['id'];

            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }

    public function error()
    {
        return 'User declined the payment!';   
    }

    
    // public function getPaypalToken()
    // {
    //     $url = 'https://api-m.sandbox.paypal.com/v1/oauth2/token';
    //     $ch = curl_init();
    //   curl_setopt_array($ch, array(
    //             CURLOPT_VERBOSE => true,
    //             CURLOPT_URL => $url,
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_USERPWD => env('PAYPAL_CLIENT_ID').':'.env('PAYPAL_SECRET_ID'),
    //             CURLOPT_POSTFIELDS => "grant_type=client_credentials",
    //             CURLOPT_CUSTOMREQUEST => "POST",
    //             CURLOPT_HTTPHEADER => array("Content-Type: application/json")
    //         ));
      
    //   $result = curl_exec($ch);
    //   $credentials = $result;

    //   curl_close($ch);
    //   $response = json_decode($credentials);      
    //   return $response;
    // }

    // public function checkoutOrders()
    // {
    //     $url = "https://api-m.sandbox.paypal.com/v2/checkout/orders";

    //     $ch = curl_init();
    //     curl_setopt_array($ch, array(
    //                 CURLOPT_VERBOSE => true,
    //                 CURLOPT_URL => $url,
    //                 CURLOPT_RETURNTRANSFER => true,
    //                 CURLOPT_POSTFIELDS => "",
    //                 CURLOPT_CUSTOMREQUEST => "POST",
    //                 CURLOPT_HTTPHEADER => array("Content-Type: application/x-www-form-urlencoded", $cart)
    //             ));
        
    //     $result = curl_exec($ch);
    //     $orders = $result;

    //     curl_close($ch);

    //     return json_decode($orders);
    // }
}
