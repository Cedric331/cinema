@extends('layouts.app')

@section('stripe')
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')

<div class="bg-dark container mt-5 p-4">
   <h3 class="text-white text-center">{{ __('Ma commande')}}</h3>
   <hr class="text-white my-1">
    <ul class="list-group my-3 text-center">
       @foreach ( $products as $product )
       <li class="mb-2 text-white">
         {{ $product->name }}
      </li>
       @endforeach
    </ul>
    <hr class="text-white my-1">
    <h5 class="text-white my-2">{{ __("Total de la commande") }}: {{$total}}€</h5>
    <div class="text-center">
     <button type="button" class="btn btn-light mt-2" id="checkout-button">{{ __('Payer')}}</button>
    </div>
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
