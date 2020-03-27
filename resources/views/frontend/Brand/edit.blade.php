@extends("layouts.adminmaster")

@section('content')



<div class="container" style="padding-top: 50px;padding-left: 130px;">
  <div class="row">
    <div class="col-md-1">
      
    </div>
    <div class="col-md-6">
      <h1 style="color:black;"> Edit brand </h1>
      <form method="post" action="{{ route('admin.brand.update',$brand->id) }}" enctype="multipart/form-data">
        <!-- {{ csrf_field() }} -->
        @csrf

        <div class="form-group">
      

      
      
    </div>
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name"  placeholder="Enter brand name" value="{{ $brand->name }}" >
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea name="description" cols="80" rows="8" class="form-control">{{ $brand->description }}</textarea>
    </div>

  
  
  <div class="form-group">
    <label>brand old Image</label>
    <div class="row">
      <div class="col-md-4">

        <img src="{{asset('img/brand/'.$brand->image)}}" alt="product" width="100"> <br>

    <label>brand  Image</label>
        <input type="file" class="form-control" name="image">
      </div>
      
    </div>
  </div>
   
  <button type="submit" class="btn btn-primary" style="margin: 20px;">Upadate brand</button>
</form>
    </div>
   
  </div>
  </div>


  @endsection
         