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
      <hr>
     <div class="row align-items-center">
      @foreach ($products as $product)
       <div class="col-lg-5 mt-3">
         <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
           <img class="img-fluid" style="width: 400px;height: 400px;" src="{{ asset('/image/products/'.$product->image) }}" alt="Image {{ $product->name }}">
           <a>
             <div class="mask rgba-white-slight"></div>
           </a>
         </div>
       </div>

       <div class="col-lg-7">
         <h4 class="font-weight-bold mb-3"><strong>{{ $product->name }}</strong></h4>
         <p>{{ $product->description }}</p>
         <a href="{{ route('products-index') }}" class="btn btn-success btn-md btn-rounded mx-0">{{ __('Voir les produits') }}</a>
       </div>
       @endforeach
     </div>
   </section>
 </div>

@endsection
