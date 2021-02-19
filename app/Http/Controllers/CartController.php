<?php

namespace App\Http\Controllers;

use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
   // public function __construct()
   // {
   //     $this->middleware('auth');
   // }
    public function store($id)
    {
      $product = Product::find($id);

      $add = \Cart::session(4)->add([
         'id' => $product->id,
         'name' => $product->name,
         'price' => $product->price,
         'quantity' => 1
     ]);

     $items = \Cart::session(4)->getContent();
     
     return response()->json($items, 200);
    }
}
