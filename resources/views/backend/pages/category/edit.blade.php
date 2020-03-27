@extends("layouts.adminmaster")

@section('content')
<div class="dashboard-wrapper">
 
  <div class="container" style="padding-top: 50px;padding-left: 70px;">
    <div class="row">
      <div class="col-md-1">
        
      </div>
      <div class="col-md-6">
        <h1 style="color:black;"> Edit Category </h1>
        <form method="post" action="{{ route('backend.pages.category.update',$category->id) }}" enctype="multipart/form-data">
          <!-- {{ csrf_field() }} -->
          @csrf

          <div class="form-group">
   
      </div>
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name"  placeholder="Enter Category name" value="{{ $category->name }}" >
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea name="description" cols="80" rows="8" class="form-control">{{ $category->description }}</textarea>
      </div>

      <div class="form-group">
        <label>Parent Category</label>

        <select class="form-control" name="parent_id">
          <option value=" "> choce a Category </option>
          @foreach ($main_categories as $main_categories)
          <option value="{{ $main_categories->id }}" {{ $main_categories->id == $category->parent_id ? 'selected' : '' }}> {{ $main_categories->name }} </option>
            
          @endforeach 
        </select>
            </div>

    
    <div class="form-group">
      <label>Category old Image</label>
      <div class="row">
        <div class="col-md-4">

          <img src="{{asset('img/category/'.$category->image)}}" alt="product" width="100"> <br>

      <label>Category  Image</label>
          <input type="file" class="form-control" name="image">
        </div>
        
      </div>
    </div>
     
    <button type="submit" class="btn btn-primary" style="margin: 20px;">Upadate Category</button>
  </form>
      </div>
     
    </div>
    </div>


  @endsection
         