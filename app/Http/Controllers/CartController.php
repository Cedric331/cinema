<?php

namespace App\Http\Controllers;

use App\Product;

use Inertia\Inertia;
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

      $add = \Cart::session(7)->add([
         'id' => $product->id,
         'name' => $product->name,
         'price' => $product->price,
         'attributes' => ['image' => $product->image],
         'quantity' => 1
     ]);

     $total = \Cart::session(7)->getTotal();
     $items = \Cart::session(7)->getContent();
     $array = [$items, $total];

     return response()->json($array, 200);
    }

    public function removeItem($id)
    {
      $product = Product::findOrFail($id);
      $item = \Cart::session(7)->get($product->id);
 
      if ($item->quantity == 1) 
      {
         \Cart::session(7)->remove($id);
      }
      else 
      {
         \Cart::session(7)->update($product->id, array(
            'quantity' => -1, 
          ));
      }

      $total = \Cart::session(7)->getTotal();
      $items = \Cart::session(7)->getContent();
      $array = [$items, $total];
     
     return response()->json($array, 200);
    }
    

    public function deleteItem($id)
    {
      $product = Product::findOrFail($id);
      \Cart::session(7)->remove($product->id);

      $total = \Cart::session(7)->getTotal();
      $items = \Cart::session(7)->getContent();
      $array = [$items, $total];
     
     return response()->json($array, 200);
    }

    public function deleteCart()
    {
      \Cart::session(7)->clear();
      $total = \Cart::session(7)->getTotal();
      $items = \Cart::session(7)->getContent();
      $array = [$items, $total];
      
     return response()->json($array, 200);
    }

    public function index()
    {
      $total = \Cart::session(7)->getTotal();
      $items = \Cart::session(7)->getContent();
 
      return Inertia::render('MyCart',[
         'items' => $items,
         'total' => $total
      ]);
    }
}
