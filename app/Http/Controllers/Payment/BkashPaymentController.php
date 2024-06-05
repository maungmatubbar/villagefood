<?php

namespace App\Http\Controllers\Payment;

use App\Billings\PaymentServices\BkashService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BkashPaymentController extends Controller
{
    protected $bkashService;

    public function __construct(BkashService $bkashService)
    {
        $this->bkashService = $bkashService;
    }

    public function createPayment(Request $request)
    {
        $amount = $request->input('amount');
        $invoice = uniqid();

        $response = $this->bkashService->createPayment($amount, $invoice);

        if (isset($response['bkashURL'])) {
            return redirect()->away($response['bkashURL']);
        }

        return back()->withErrors('Failed to initiate payment.');
    }

    public function callback(Request $request)
    {
        $paymentId = $request->query('paymentID');
        $response = $this->bkashService->executePayment($paymentId);

        if (isset($response['transactionStatus']) && $response['transactionStatus'] == 'Completed') {
            // Handle successful payment
            notyf('Payment successful!','success');
            return redirect()->route('order.complete')->with('success', 'Payment successful!');
        }

        notyf()->warning('Payment failed!');
        return redirect()->route('home')->withErrors('Payment failed.');
    }
}
