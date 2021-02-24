<?php

namespace App\Http\Controllers;

use App\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
         'user' => $user,
         'url' => URL::route('password.request'),
      ]);
   }

   public function update(Request $request)
   {
      $user = User::find(Auth::user()->id);

         $request->validate([
            'phone' => ['required', 'regex:/[0-9]{10}/'],
            'name' => ['required', 'string', 'max:255'],
         ]);

         if ($user->email != $request->email) {
            $request->validate([
               'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
         }

         $user->name = $request->name;
         $user->email = $request->email;
         $user->phone = $request->phone;
         $user->save();

         return response()->json(null, 200);
   }

   public function delete()
   {
      $user = User::find(Auth::user()->id);

      $user->delete();
      return response()->json(null, 200);
   }
}
