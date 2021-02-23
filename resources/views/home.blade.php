@extends('layouts.app')

@section('content')

<div class="card bg-dark text-white container-fluid">
   <img id="imageHome" src="{{ asset('/image/pizza-home.jpg') }}" class="card-img" alt="Image d'accueil">
   <div class="card-img-overlay text-center mt-5">
     <strong class="card-title">
      <a class="btn btn-white"  href="{{ route('products-index') }}">
         <h2>{{ __('Commander en ligne') }}</h2>
      </a>
   </strong>
   </div>
 </div>

 <div class="container-fluid bg-light p-3">
   <section class="dark-grey-text">
     <h2 class="text-center font-weight-bold mb-4 pb-2">{{ __('Notre Sélection du Mois') }}</h2>
     <p class="text-center mx-auto w-responsive mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur veniam.</p>

     <div class="row align-items-center">
 
       <div class="col-lg-5 mt-3">
         <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
           <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/img%20(27).jpg" alt="Sample image">
           <a>
             <div class="mask rgba-white-slight"></div>
           </a>
         </div>
       </div>

       <div class="col-lg-7">
         <h4 class="font-weight-bold mb-3"><strong>Title of the news</strong></h4>
         <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime
           placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus et aut officiis debitis.</p>
         <a class="btn btn-success btn-md btn-rounded mx-0">Read more</a>
       </div>

     </div>
   </section>
 </div>

@endsection
