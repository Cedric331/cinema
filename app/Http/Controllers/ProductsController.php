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
       $items = \Cart::session(6)->getContent();

       return Inertia::render('Products',[
          'listProducts' => $products,
          'items' => $items
       ]);
    }
}
