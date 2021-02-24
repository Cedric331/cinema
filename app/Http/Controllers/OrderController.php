<?php

namespace App\Http\Controllers;

use App\Order;
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

   public function cancel()
   {
      $items = \Cart::session(Auth::user()->id)->getContent();

      if (count($items) == 0) {
        return redirect()->route('cart-index');
      }

      return view('checkout.cancel');
   }

   public function success()
   {
      $items = \Cart::session(Auth::user()->id)->getContent();

      if (count($items) == 0) {
        return redirect()->route('cart-index');
      }

      $items = \Cart::session(Auth::user()->id)->getContent();
      $products = [];
      foreach ($items as $item) {
            $products[] = [
            'product' => [
            'price' => intval($item['price']*100),
            'name' => $item['name'],
            'quantity' => $item['quantity'],
               ]
            ];
         }
      $products = json_encode($products);
      $total = \Cart::session(Auth::user()->id)->getTotal();
      $total = str_replace(',', '.', $total);

      $order = new Order;
      $order->reference = uniqid();
      $order->user_id = Auth::user()->id;
      $order->total = $total;
      $order->products = $products;
      $order->save();


      \Cart::session(Auth::user()->id)->clear();

      return view('checkout.success');
   }
}
