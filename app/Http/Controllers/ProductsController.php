<?php

namespace App\Http\Controllers;

use App\Product;
use Inertia\Inertia;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
      $products = Product::with('ingredients')->get();

      if (Auth::check()) {
         $items = \Cart::session(Auth::user()->id)->getContent();
         $total= \Cart::session(Auth::user()->id)->getTotal();
      } else{
         $items = [];
         $total = 0;
      }

       return Inertia::render('Products',[
          'listProducts' => $products,
          'items' => $items,
          'total' => $total,
          'auth' => Auth::check(),
       ]);
    }
}
