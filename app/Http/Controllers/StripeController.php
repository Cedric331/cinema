<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
   public function index()
   {
      $YOUR_DOMAIN = 'http://localhost:8000';

      $items = \Cart::session(7)->getContent();
      $products = [];
      foreach ($items as $item) {

            $products[] = [
            'price_data' => [
              'currency' => 'eur',
              'unit_amount' => $item['price'],
              'product_data' => [
                 'name' => $item['name'],
                 'images' => [$YOUR_DOMAIN."/public/image/products/".$item['attributes']->image],
                      ],
            ],
            'quantity' => $item['quantity'],
         ];
      }
dd($products);


      Stripe::setApiKey('sk_test_51IAusCI6YwgpDkGgRmZowmNTpDQPHZRfJFOWrXJU4o3F7tTmeemAL21Ss81Z7PuPmuTchvw0Z8BVDemuYYLlNBOh00WFmn8iGO');

      $checkout_session = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
          'price_data' => [
            'currency' => 'eur',
            'unit_amount' =>12 ,
            'product_data' => [
               'name' => 'Stubborn Attachments',
               'images' => ["/public/image/products/"],
                    ],
          ],
          'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => $YOUR_DOMAIN . '/success.html',
        'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
      ]);

      dd($checkout_session);
   }
}
