@extends('layouts.app')

@section('content')
<a href="locale/en">English</a>
<a href="locale/fr">Français</a>
   <div class="container-fluid">
      <div>
         <img id="imageHome" src="{{ asset('/image/pizza-home.jpg') }}">
      </div>
      <div id="messageHome">
         <button class="btn btn-white">
            <h3 class="font-bold text-center m-auto">
               {{ __('Commander en ligne') }}
            </h1>
         </button>
       </div>
   </div>

@endsection
