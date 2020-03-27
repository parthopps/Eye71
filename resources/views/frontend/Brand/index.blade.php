@extends("layouts.adminmaster")

@section('content')



<div class="container" style="padding-top: 50px;padding-left: 70px;">
  <div class="row">
    <div class="col-md-1">
      
    </div>
    <div class="col-md-8">
      <h1 style="color:black;"> Manage brand </h1>
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Parent brand Name</th>
      <th scope="col">brand Name</th>
      <th scope="col">brand Description</th>
      <th scope="col">brand Image</th>
      <th scope="col">Parent brand</th>
  
      <th scope="col">Action</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>

  <?php $i=1; ?>
  @foreach ($brand as $brand)
 
    <tr>
      <th scope="row"><?php echo $i++ ?></th> 
      <th scope="row">{{ $brand->id }}</th>
      <td>{{ $brand->name }}</td>
      <td>{{ $brand->description }}</td>
      <td>
        <img src="{{asset('img/brand/'.$brand->image)}}" alt="product" width="100">
      </td>
      <td>
        

        @if ( $brand->parent_id == NULL )
             primary brand
        @else
           {{ $brand->parent->name }}
           

         @endif   

      </td>

           <td><a href="{{ route('admin.brand.edit',$brand->id) }}" class="btn btn-success"> Edit </a></td>
          <td><a href="{{ route('admin.brand.delete',$brand->id) }}" class="btn btn-danger"> Delete </a></td> 

      
    </tr>

   @endforeach 
  </tbody>
</table>
      
    </div>
   
  </div>
  </div>


  @endsection
         