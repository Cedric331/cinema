<?php

namespace App\Http\Controllers;

use App\Product;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
       $products = Product::All();

       return Inertia::render('Products',[
          'listProducts' => $products
       ]);
    }
}
