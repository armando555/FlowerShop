<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Bouquet;
use App\Models\Candy;
use App\Models\Order;
use App\Models\Item;
use App\Models\Flower;
use App\Models\Combo;
use Illuminate\Support\Facades\Auth;


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

    public function process($orderId, Request $request)
    {
        $access_token = $this->getAccessToken();
        $response = $this->client->request('GET', '/v2/checkout/orders/' . $orderId, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $access_token
            ],
        ]);
        $data = json_decode($response->getBody(), true);
        if ($data === 'APPROVED') {
            $idFlowers = $request->session()->get('flowers');
            $idBouquets = $request->session()->get('bouquets');
            $idCombos = $request->session()->get('combos');
            $idCandies = $request->session()->get('candies');
            $quantityFlower = $request->session()->get('quantityFlower');
            $quantityBouquet = $request->session()->get('quantityBouquet');
            $quantityCombo = $request->session()->get('quantityCombo');
            $quantityCandy = $request->session()->get('quantityCandy');
            $total = 0;
            if (!is_null($idFlowers) || !is_null($idBouquets) || !is_null($idCombos) || !is_null($idCandies)) {
                $order = new Order();
                $order->setTotal(0);
                if (Auth::check()) {
                    $order->setUserId(auth()->user()->id);
                }
                $order->save();
                if (!is_null($idFlowers)) {
                    $flowers = Flower::find(array_values($idFlowers));
                    foreach ($flowers as $flower) {
                        $item = new Item();
                        $item->setOrderId($order->getId());
                        $item->setType("flower");
                        $item->setFlowerId($flower->getId());
                        $item->setSubtotal($flower->getPrice() * $quantityFlower[$flower->getId()]);
                        $item->setDiscount(0);
                        $item->setAmount($quantityFlower[$flower->getId()]);
                        $total += $flower->getPrice() * $quantityFlower[$flower->getId()];
                        $item->save();
                    }
                }
                if (!is_null($idBouquets)) {
                    $bouquets = Bouquet::find(array_values($idBouquets));
                    foreach ($bouquets as $bouquet) {
                        $item = new Item();
                        $item->setOrderId($order->getId());
                        $item->setBouquetId($bouquet->getId());
                        $item->setType("bouquet");
                        $item->setSubtotal($bouquet->getPrice() * $quantityBouquet[$bouquet->getId()]);
                        $item->setDiscount(0);
                        $item->setAmount($quantityBouquet[$bouquet->getId()]);
                        $total += $bouquet->getPrice() * $quantityBouquet[$bouquet->getId()];
                        $item->save();
                    }
                }
                if (!is_null($idCombos)) {
                    $combos = Combo::find(array_values($idCombos));
                    foreach ($combos as $combo) {
                        $item = new Item();
                        $item->setOrderId($order->getId());
                        $item->setComboId($combo->getId());
                        $item->setType("combo");
                        $item->setAmount($quantityCombo[$combo->getId()]);
                        $item->setSubtotal($combo->getPrice() * $quantityCombo[$combo->getId()]);
                        $item->setDiscount(0);
                        $total += $combo->getPrice() * $quantityCombo[$combo->getId()];
                        $item->save();
                    }
                }
                if (!is_null($idCandies)) {
                    $candies = Candy::find(array_values($idCandies));
                    foreach ($candies as $candy) {
                        $item = new Item();
                        $item->setOrderId($order->getId());
                        $item->setCandyId($candy->getId());
                        $item->setType("candy");
                        $item->setAmount($quantityCandy[$candy->getId()]);
                        $item->setSubtotal($candy->getPrice() * $quantityCandy[$candy->getId()]);
                        $item->setDiscount(0);
                        $total += $candy->getPrice() * $quantityCandy[$candy->getId()];
                        $item->save();
                    }
                }
                $order->setTotal($total);
                $order->save();
                return ['success' => true];    
            }else{
                return ['success' => false];
            }
            
        }
    }
}
