@extends('layouts.app')

@section('content')
<div class="container my-5 bg-light p-2">
   <section class="dark-grey-text text-center">

     <h3 class="font-weight-bold black-text mb-4 pb-2">{{ __('Mon Compte') }}</h3>
     <hr class="w-header">
     <div class="row">

       <div class="col-md-4 mb-4">
         <a href="{{ route('cart-index') }}" class="card hoverable">
           <div class="card-body my-4">
              <p><i class="fas fa-tablet-alt fa-2x text-muted"></i></p>
             <h5 class="black-text mb-0">{{ __('Mon Panier') }}</h5>
           </div>
         </a>
       </div>
       <div class="col-md-4 mb-4">

         <a href="{{ route('account-information') }}" class="card hoverable">
           <div class="card-body my-4">

              <p><i class="fas fa-cogs fa-2x text-muted"></i></p>
             <h5 class="black-text mb-0">{{ __('Mes Informations') }}</h5>
           </div>
         </a>
       </div>
       <div class="col-md-4 mb-4">
         <a href="{{ route('account-order') }}" class="card hoverable">
           <div class="card-body my-4">
              <p><i class="fas fa-pencil-ruler fa-2x text-muted"></i></p>
             <h5 class="black-text mb-0">{{ __('Mes Commandes') }}</h5>
           </div>
         </a>
       </div>
     </div>
    </section>
 </div>

@endsection
