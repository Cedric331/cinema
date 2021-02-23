<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }
   
   public function index()
   {
      $total = \Cart::session(Auth::user()->id)->getTotal();
      $items = \Cart::session(Auth::user()->id)->getContent();

      if (count($items) == 0) {
        return redirect()->route('cart-index');
      }

      return view('checkout.cart',[
         'total' => $total,
         'products' => $items
      ]);
   }
}
