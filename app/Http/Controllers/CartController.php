<?php

namespace App\Http\Controllers;

use App\Product;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }

    public function store($id)
    {
      $product = Product::find($id);

      $add = \Cart::session(Auth::user()->id)->add([
         'id' => $product->id,
         'name' => $product->name,
         'price' => $product->price,
         'attributes' => ['image' => $product->image],
         'quantity' => 1
     ]);

     $total = \Cart::session(Auth::user()->id)->getTotal();
     $items = \Cart::session(Auth::user()->id)->getContent();
     $array = [$items, $total];

     return response()->json($array, 200);
    }

    public function removeItem($id)
    {
      $product = Product::findOrFail($id);
      $item = \Cart::session(Auth::user()->id)->get($product->id);
 
      if ($item->quantity == 1) 
      {
         \Cart::session(Auth::user()->id)->remove($id);
      }
      else 
      {
         \Cart::session(Auth::user()->id)->update($product->id, array(
            'quantity' => -1, 
          ));
      }

      $total = \Cart::session(Auth::user()->id)->getTotal();
      $items = \Cart::session(Auth::user()->id)->getContent();
      $array = [$items, $total];
     
     return response()->json($array, 200);
    }
    

    public function deleteItem($id)
    {
      $product = Product::findOrFail($id);
      \Cart::session(Auth::user()->id)->remove($product->id);

      $total = \Cart::session(Auth::user()->id)->getTotal();
      $items = \Cart::session(Auth::user()->id)->getContent();
      $array = [$items, $total];
     
     return response()->json($array, 200);
    }

    public function deleteCart()
    {
      \Cart::session(Auth::user()->id)->clear();
      $total = \Cart::session(Auth::user()->id)->getTotal();
      $items = \Cart::session(Auth::user()->id)->getContent();
      $array = [$items, $total];
      
     return response()->json($array, 200);
    }

    public function index()
    {
      $total = \Cart::session(Auth::user()->id)->getTotal();
      $items = \Cart::session(Auth::user()->id)->getContent();
 
      return Inertia::render('MyCart',[
         'items' => $items,
         'total' => $total
      ]);
    }
}
