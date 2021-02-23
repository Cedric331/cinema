@extends('layouts.app')

@section('content')
<div class="container my-5">
   <section class="dark-grey-text text-center">
     <h6 class="font-weight-normal text-uppercase font-small grey-text mb-4">Features</h6>

     <h3 class="font-weight-bold black-text mb-4 pb-2">Unique Factors</h3>
     <hr class="w-header">
     <p class="lead text-muted mx-auto mt-4 pt-2 mb-5">It's really easy to create a landing page for your awesome product.</p>
     <div class="row">

       <div class="col-md-3 mb-4">
         <a href="#!" class="card hoverable">
           <div class="card-body my-4">
              <p><i class="fas fa-tablet-alt fa-2x text-muted"></i></p>
             <h5 class="black-text mb-0">Responsive</h5>
           </div>
         </a>
       </div>
       <div class="col-md-3 mb-4">

         <a href="#!" class="card hoverable">
           <div class="card-body my-4">

              <p><i class="fas fa-cogs fa-2x text-muted"></i></p>
             <h5 class="black-text mb-0">Customizable</h5>
           </div>
         </a>
       </div>
       <div class="col-md-3 mb-4">
         <a href="#!" class="card hoverable">
           <div class="card-body my-4">
              <p><i class="fas fa-pencil-ruler fa-2x text-muted"></i></p>
             <h5 class="black-text mb-0">UI Elements</h5>
           </div>
         </a>
       </div>
       <div class="col-md-3 mb-4">

         <a href="#!" class="card hoverable">
           <div class="card-body my-4">

              <p><i class="fas fa-recycle fa-2x text-muted"></i></p>
             <h5 class="black-text mb-0">Clean Code</h5>
           </div>
         </a>
       </div>
     </div>
    </section>
 </div>

@endsection
