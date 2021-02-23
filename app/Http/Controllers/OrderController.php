<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
   public function index()
   {
      $total = \Cart::session(Auth::user()->id)->getTotal();
      $items = \Cart::session(Auth::user()->id)->getContent();

      return view('checkout.cart',[
         'total' => $total,
         'products' => $items
      ]);
   }
}
