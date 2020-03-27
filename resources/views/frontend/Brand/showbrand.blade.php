@extends("layouts.master")

 @section('content')



 <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.partials.category_menu')
                    @include('frontend.partials.brand_menu')
                 
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="container">
 
                <div class="products text-center">
                    <h3> {{$brand->name}}</h3>

                   @php

                    $products = $brand->products()->paginate(10);
                    @endphp

                    @if($products->count() > 0)

                    @include('frontend.partials.productview')
                    
                    @else
                    <h1>nei</h1>
                    @endif
               

            </div> <!-- end container -->

        </div>
                        
    </section>


  @endsection