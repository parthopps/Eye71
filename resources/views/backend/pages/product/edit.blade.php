@extends("layouts.adminmaster")

 @section('content') <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
        	<div class="container" style="padding-top: 50px;padding-left: 70px;">
  <div class="row">
    <div class="col-md-1">
      
    </div>
    <div class="col-md-6">
      <h1 style="color:black;"> Update PRODUCT </h1>
      <form method="post" action="{{ route('backend.pages.product.update',$products->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
      

      
    </div>
    <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" name="title"  placeholder="Enter Title" value="{{ $products->title }}">
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea name="description" cols="80" rows="8" class="form-control">{{ $products->description }}</textarea>
    </div>
      <div class="form-group">
    <label>Price</label>
    <input type="number" class="form-control" name="price"  placeholder="Enter Price" value="{{ $products->price }}">
  </div>
  <div class="form-group">
    <label>Offer Price</label>
    <input type="number" class="form-control" name="offer_price"  placeholder="Enter Price" value="{{ $products->offer_price }}">
  </div>






   <div class="form-group">
    <label>Quantity</label>
    <input type="number" class="form-control" name="quantity"  placeholder="Enter Price" value="{{ $products->quantity }}">
  </div>
 <!--  <div class="form-group">
    <label>Product Image</label>
    <div class="row">
      <div class="col-md-4">
        <input type="file" class="form-control" name="product_image[]">
      </div>
      <div class="col-md-4">
        <input type="file" class="form-control" name="product_image[]">
      </div>
      <div class="col-md-4">
        <input type="file" class="form-control" name="product_image[]">
      </div>
      <div class="col-md-4">
        <input type="file" class="form-control" name="product_image[]">
      </div>
      <div class="col-md-4">
        <input type="file" class="form-control" name="product_image[]">
      </div>
      <div class="col-md-4">
        <input type="file" class="form-control" name="product_image[]">
      </div>
    </div>
  </div> -->
   
  <button type="submit" class="btn btn-primary" style="margin: 20px;">Update Product</button>
</form>
    </div>
   
  </div>
  </div>		
               </div>

        			@endsection