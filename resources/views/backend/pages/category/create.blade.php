@extends("layouts.adminmaster")

 @section('content') 
            <div class="dashboard-wrapper">

                  <div class="container" style="padding-top: 50px;padding-left: 70px;">
                    <div class="row">
                      <div class="col-md-1">
                        
                      </div>
                      <div class="col-md-6">
                        <h1 style="color:black;"> create Category </h1>
                        <form method="post" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                          <!-- {{ csrf_field() }} -->
                          @csrf

                          <div class="form-group">
                        

                       
                        
                      </div>
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter Category name">
                      </div>
                      <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" cols="80" rows="8" class="form-control"></textarea>
                      </div>

                      <div class="form-group">
                        <label>Parent Category</label>

                        <select class="form-control" name="parent_id">
                          <option value=" "> choce a Category </option>
                          @foreach ($main_categories as $main_categories)
                          <option value="{{ $main_categories->id }}"> {{ $main_categories->name }} </option>
                            
                          @endforeach 
                        </select>
                            </div>

                    
                    <div class="form-group">
                      <label>Category Image</label>
                      <div class="row">
                        <div class="col-md-4">
                          <input type="file" class="form-control" name="image">
                        </div>
                        
                      </div>
                    </div>
                     
                    <button type="submit" class="btn btn-primary" style="margin: 20px;">Add Category</button>
                  </form>
                      </div>
                     
                    </div>
                    </div>


  @endsection
         