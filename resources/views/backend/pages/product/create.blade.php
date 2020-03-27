@extends("layouts.adminmaster")

 @section('content')

 <div class="container">
 	 <div class="row">
 	 	<div class="dashboard-wrapper">
                        <!-- ============================================================== -->
                        <!-- valifation types -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="card">
                                <h3 class="card-header">ADD PRODUCT</h3>
                                <div class="card-body">
                                    <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                                       {{ csrf_field() }}

                                        <div class="form-group"> 
									      <div class="col-12 col-sm-8 col-lg-6">
									      	<label>Title</label>
									      <input type="text" class="form-control" name="title"  placeholder="Enter Title">
									      </div>
									    </div>


                                        <div class="form-group">
                                        	<div class="col-12 col-sm-8 col-lg-6">
									      <label>Description</label>
									      </div>
									      <textarea name="description" cols="80" rows="8" class="form-control"></textarea>
									    </div>
                                        
                                       <div class="form-group"> 
									      <div class="col-12 col-sm-8 col-lg-6">
									      	<label>Price</label>
									      <input type="text" class="form-control" name="price"  placeholder="Enter Title">
									      </div>
									    </div>

                                       
                                       <div class="form-group"> 
									      <div class="col-12 col-sm-8 col-lg-6">
									      	<label>Offer Price</label>
									      <input type="text" class="form-control" name="offer_price"  placeholder="Enter Title">
									      </div>
									    </div>

                                        <div class="form-group"> 
									      <div class="col-12 col-sm-8 col-lg-6">
									      	<label>Quantity</label>
									      <input type="text" class="form-control" name="quantity"  placeholder="Enter Title">
									      </div>
									    </div>

									    <div class="form-group">
										      <label>Select Category</label>

										      <select class="form-control" name="category_id">
										        <option value=" "> choce a Category </option>
										        @foreach(App\Category::orderby('name','asc')->where('parent_id',NULL)->get() as $parent)

										          <option value="{{$parent->id}} "> {{$parent->name}} </option>
										          @foreach(App\Category::orderby('name','asc')->where('parent_id',$parent->id)->get() as $child)
										          <option value="{{$child->id}} "> --->{{$child->name}} </option>
										          @endforeach

										        @endforeach
										      </select>
										          </div>
										             <div class="form-group">
										      <label>Select Brand</label>

										      <select class="form-control" name="brand_id">
										        <option value=" "> choce a Brand </option>
										        @foreach(App\Brand::orderby('name','asc')->get() as $parent)
										          <option value="{{$parent->id}} "> {{$parent->name}} </option>
										        @endforeach
										      </select>
										          </div>

                                        <!-- <div class="form-group"> 
									      <div class="col-12 col-sm-8 col-lg-6">
									      	<label>Select Category</label>
									      	 <select class="form-control" name="category_id">
											        <option value=" "> choce a Category </option>
											          <option value=""> pps </option>
											        <option value=""> mks </option>   
											      </select>
									      </div>
									    </div>

                                       <div class="form-group"> 
									      <div class="col-12 col-sm-8 col-lg-6">
									      	<label>Select Category</label>
									      	 <select class="form-control" name="category_id">
											        <option value=" "> choce a Category </option>
											          <option value=""> pps </option>
											        <option value=""> mks </option>   
											      </select>
									      </div>
									    </div>  -->

                                        

                                        <div class="form-group">
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
										  </div>  

                                        <button type="submit" class="btn btn-primary" style="margin: 20px;">Add Product</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end valifation types -->
                        <!-- ============================================================== -->
                    </div>
 </div>
 </div>

 @endsection