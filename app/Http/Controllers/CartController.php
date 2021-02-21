<?php

namespace App\Http\Controllers;

use App\Product;

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

      $add = \Cart::session(6)->add([
         'id' => $product->id,
         'name' => $product->name,
         'price' => $product->price,
         'quantity' => 1
     ]);

     $items = \Cart::session(6)->getContent();
     
     return response()->json($items, 200);
    }

    public function removeItem($id)
    {
      $product = Product::findOrFail($id);
      $item = \Cart::session(6)->get($product->id);

      if ($item->quantity == 1) 
      {
         \Cart::session(6)->remove($id);
      }
      else 
      {
         \Cart::session(6)->update($product->id, array(
            'quantity' => -1, 
          ));
      }

     $items = \Cart::session(6)->getContent();
     
     return response()->json($items, 200);
    }

    public function deleteItem($id)
    {
      $product = Product::findOrFail($id);
      \Cart::session(6)->remove($id);

     $items = \Cart::session(6)->getContent();
     
     return response()->json($items, 200);
    }
}
