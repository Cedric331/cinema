@extends('layouts.app')

@section('content')

<div class="container my-5">

   <section class="dark-grey-text text-center mb-5">

     <div class="card">
      <h3 class="font-weight-bold mb-5">{{ __('Mes commandes') }}</h3>
       <div class="card-body">
         <table class="table table-responsive-md mb-0">
           <thead>
             <tr>
               <th>
                 <strong>{{ __('Date de la commande') }}</strong>
               </th>
               <th>
                 <strong>{{ __('Référence') }}</strong>
               </th>
               <th>
                 <strong>{{ __('Produits') }}</strong>
               </th>
               <th>
                 <strong>{{ __('Total de la commande') }}</strong>
               </th>
             </tr>
           </thead>
           <tbody>
              @foreach ($orders as $order)
               <tr>
                  <th scope="row">{{ $order->created_at->format('d/m/Y') }}</th>
                  <td>{{ $order->reference }}</td>
                  <td>
                     @foreach ($order->products as $product)
                         {{ $product->product->name }} - 
                         {{ __('quantité') }} : {{ $product->product->quantity }} -
                         {{ __('prix') }} : {{ str_replace('.', ',',$product->product->price/100) }} €
                         <br>
                     @endforeach
                  </td>
                  <td>{{ str_replace('.', ',',$order->total) }} €</td>
               </tr>
              @endforeach

           </tbody>
         </table>
       </div>
     </div>

    </section>
<div>

@endsection
