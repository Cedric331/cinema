<?php

namespace App\Http\Controllers;

use App\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
   public function index()
   {
      return view('auth.account');
   }

   public function information()
   {
      $user = User::find(Auth::user()->id);
      return Inertia::render('AccountInformation',[
         'user' => $user
      ]);
   }
}
