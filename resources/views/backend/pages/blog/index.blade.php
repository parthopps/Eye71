@extends("layouts.adminmaster")

@section('content')



<div class="container" style="padding-top: 50px;padding-left: 70px;">
  <div class="row">
    <div class="col-md-1">
      
    </div>
    <div class="col-md-8">
      <h1 style="color:black;"> Manage Blog </h1>
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      
      <th scope="col">blog Name</th>
      <th scope="col">blog Description</th>
      <th scope="col">blog Image</th>
      
  
      <th scope="col">Action</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>

  <?php $i=1; ?>
  @foreach ($blog as $blog)
 
    <tr>
      <th scope="row"><?php echo $i++ ?></th> 
      
      <td>{{ $blog->name }}</td>
      <td>{{ $blog->description }}</td>
      
      <td>
        <img src="{{asset('img/blog/'.$blog->image)}}" alt="product" width="100">
      </td>
      <td><a href="{{ route('admin.blog.edit',$blog->id) }}" class="btn btn-success"> Edit </a></td>
     <td><a href="{{ route('admin.blog.delete',$blog->id) }}" class="btn btn-danger"> Delete </a></td>


      
    </tr>

   @endforeach 
  </tbody>
</table>
      
    </div>
   
  </div>
  </div>


  @endsection
         