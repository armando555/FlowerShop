<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PaypalController extends Controller
{
    private $client;
    private $clientId;
    private $secret;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api-m.sandbox.paypal.com'
        ]);
        $this->clientId = "AeY5CtEIhgzel5BnloTMMrGnPoZK-i_9PwJscOhe2xgDzYZvEh-hZYLBLKPJVSctcyrZCh11aZX2RHp2";
        $this->secret = "EOXKW4-mouIv_N2SR_4r0nMnxv8CX0g8vMGrRXiI8UcnGagaUWzrVTHh_sgzqf_K1GGNKqjGaS00LdOe";
    }
    private function getAccessToken()
    {
        $response = $this->client->request(
            'POST',
            '/v1/oauth2/token',
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'body' => 'grant_type=client_credentials',
                'auth' => [
                    $this->clientId, $this->secret, 'basic'
                ]
            ]
        );

        $data = json_decode($response->getBody(), true);
        return $data['access_token'];
    }

    public function process($orderId)
    {
        $access_token = $this->getAccessToken();


        $response = $this->client->request('GET', '/v2/checkout/orders/' . $orderId, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $access_token
            ],
        ]);
        return (json_decode($response->getBody()));
    }
}
