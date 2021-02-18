<?php

namespace App\Http\Controllers;

use App\society;
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
       $society = society::first();

        return view('home', [
           'society' => $society
        ]);
    }
}
