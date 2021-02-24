<?php

namespace App\Http\Controllers;

use App\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }

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

   public function update(Request $request)
   {
      $user = User::find(Auth::user()->id);

      if (!$user) {
         return response()->json(null, 400);
      }
      
      $user->name = $request->name;
      $user->email = $request->email;
      $user->save();

      return response()->json(null, 200);
   }
}
