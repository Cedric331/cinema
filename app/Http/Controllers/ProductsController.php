<?php

namespace App\Http\Controllers;

use App\Product;
use Inertia\Inertia;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
       $products = Product::All();
       $items = \Cart::session(7)->getContent();
       $total= \Cart::session(7)->getTotal();
       
       return Inertia::render('Products',[
          'listProducts' => $products,
          'items' => $items,
          'total' => $total
       ]);
    }
}
