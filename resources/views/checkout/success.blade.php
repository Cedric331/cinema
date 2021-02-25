@extends('layouts.app')

@section('content')

<div class="container my-5 py-5 z-depth-1 bg-light">

   <section class="text-center px-md-5 mx-md-5 mb-0 dark-grey-text">
     <h3 class="font-weight-bold mb-4 pb-2"><i class="fas fa-check-circle"></i>{{ __('Merci pour votre achat') }}</h3>
     <hr class="my-5">
     <a href="{{ route('account-order') }}" class="btn btn-dark btn-rounded">{{ __('Mes Commandes') }}</a>

   </section>
 </div>

@endsection
