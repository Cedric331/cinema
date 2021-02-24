<?php

namespace App\Http\Controllers;

use App\Product;
use App\Society;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $products = Product::where('top', true)->get();

        return view('home',[
           'products' => $products
        ]);
    }
}
