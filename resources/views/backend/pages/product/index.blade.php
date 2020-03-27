@extends("layouts.adminmaster")

 @section('content') <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
        	<div class="container">
        		<div class="row">
        	<div class="col-md-8">
      <h1 style="color:black;"> Manage PRODUCT </h1>
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Title</th>
      <th scope="col">Product Description</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Quantity</th>
      <th scope="col">Action</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>

  <?php $i=1; ?>
  @foreach ($products as $products)
 
    <tr>
      <th scope="row"><?php echo $i++ ?></th>
      <td>{{ $products->title }}</td>
      <td>{{ $products->description }}</td>
      <td>{{ $products->price }}</td>
      <td>{{ $products->quantity }}</td>
      <td><a href="{{ route('backend.pages.product.edit',$products->id) }}" class="btn btn-success"> Edit </a></td>
      <td><a href="{{ route('backend.pages.product.delete',$products->id) }}" class="btn btn-danger"> Delete </a></td>
    </tr>

   @endforeach 
  </tbody>
</table>
      
    </div>
   </div> 		
 </div>       		

@endsection
        	   