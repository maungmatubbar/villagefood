<?php

namespace App\Billings\PaymentServices;

use Illuminate\Support\Facades\Http;

class BkashService
{
    protected $appKey;
    protected $appSecret;
    protected $username;
    protected $password;
    protected $baseUrl;
    protected $token;

    public function __construct()
    {
        $this->appKey = config('services.bkash.app_key');
        $this->appSecret = config('services.bkash.app_secret');
        $this->username = config('services.bkash.username');
        $this->password = config('services.bkash.password');
        $this->baseUrl = config('services.bkash.base_url');
        $this->token = $this->authenticate();
    }

    protected function authenticate()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post("{$this->baseUrl}/token/grant", [
            'app_key' => $this->appKey,
            'app_secret' => $this->appSecret
        ]);

        $data = $response->json();
        return $data['id_token'];
    }

    public function createPayment($amount, $invoice)
    {
        $response = Http::withToken($this->token)->post("{$this->baseUrl}/checkout/payment/create", [
            'mode' => '0011',
            'payerReference' => ' ',
            'callbackURL' => route('bkash.callback'),
            'amount' => $amount,
            'currency' => 'BDT',
            'intent' => 'sale',
            'merchantInvoiceNumber' => $invoice,
        ]);

        return $response->json();
    }

    public function executePayment($paymentId)
    {
        $response = Http::withToken($this->token)->post("{$this->baseUrl}/checkout/payment/execute/{$paymentId}");
        return $response->json();
    }

    public function queryPayment($paymentId)
    {
        $response = Http::withToken($this->token)->get("{$this->baseUrl}/checkout/payment/query/{$paymentId}");
        return $response->json();
    }
}
