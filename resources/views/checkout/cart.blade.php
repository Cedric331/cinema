@extends('layouts.app')

@section('stripe')
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')

<div class="container my-5">
   <section>
     <div class="card mb-4">
       <div class="row">
         <div class="col-md-6">
            <h4 class="font-weight-normal my-2">{{ __('Récapitulatif de la commande') }}</h4>
            <hr>
            <ul class="list-unstyled font-small mt-5 mb-0 row">
               @foreach ( $products as $product )
                <li class="col-6">
                  <p class="text-uppercase mb-2"><strong>{{ $product->name }}</strong></p>
                  <p class="text-muted mb-4">{{ __('Quantité') }} : {{ $product->quantity }}</p>
                  <p class="text-muted mb-4">{{ __('Prix') }} : {{ $product->price }} €/{{ __('unité') }}</p>
                </li>
                @endforeach
              </ul>
         </div>
         <div class="col-md-6 p-5 align-self-center">
           <ul class="list-unstyled font-small mt-5 mb-0">
             <li>
               <p class="text-uppercase mb-2"><strong>{{ __('Total de la commande') }} : {{ $total }} €</strong></p>
             </li>
           </ul>
           <button type="button" class="btn btn-dark mt-2" id="checkout-button">{{ __('Payer')}}</button>
            <a href="{{ route('cart-index') }}" class="btn btn-primary ml-3 mt-2">{{ __('Modifier ma commande') }}</a>
         </div>
         <div class="col-12 my-3">
            {{ __('Pour faire un test d\'achat le code de la carte doit être') }} : 4242 4242 4242 4242
         </div>
       </div>
     </div>
   </section>
 </div>

@endsection

@section('stripe-end')

<script type="text/javascript">

   var stripe = Stripe("pk_test_51IAusCI6YwgpDkGgezCDiDwZdI4IcazpPq8DrKtcL3qj4NhvX0sE0iKxKgSbTrwYt5nVwl6PWUgVUcezhgIOwCWn00ITt60Dqn");
   var checkoutButton = document.getElementById("checkout-button");
   checkoutButton.addEventListener("click", function () {
     fetch("/create-checkout-session", {
       method: "POST",
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     })
       .then(function (response) {
         return response.json();
       })
       .then(function (session) {
         return stripe.redirectToCheckout({ sessionId: session.id });
       })
       .then(function (result) {
         if (result.error) {
           alert(result.error.message);
         }
       })
       .catch(function (error) {
         console.error("Error:", error);
       });
   });
 </script>
 @endsection
