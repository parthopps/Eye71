@extends("layouts.adminmaster")

 @section('content') 
            <div class="dashboard-wrapper">

                <div class="container" style="padding-top: 50px;padding-left: 70px;">
                  <div class="row">
                    <div class="col-md-1">
                      
                    </div>
                    <div class="col-md-10">
                      <h1 style="color:black;"> Manage Categories </h1>
                      <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Parent category Name</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">Category Description</th>
                      <th scope="col">Category Image</th>
                      <th scope="col">Parent Category</th>
                  
                      <th scope="col">Action</th>
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                  <?php $i=1; ?>
                  @foreach ($categories as $categories)
                 
                    <tr>
                      <th scope="row"><?php echo $i++ ?></th> 
                      <th scope="row">{{ $categories->id }}</th>
                      <td>{{ $categories->name }}</td>
                      <td>{{ $categories->description }}</td>
                      <td>
                        <img src="{{asset('img/category/'.$categories->image)}}" alt="product" width="100">
                      </td>
                      <td>
                        

                        @if ( $categories->parent_id == NULL )
                             primary Category
                        @else
                           {{ $categories->parent->name }}
                           

                         @endif   

                      </td>

                          <td><a href="{{ route('backend.pages.category.edit',$categories->id) }}" class="btn btn-success"> Edit </a></td>
                          <td><a href="{{ route('backend.pages.category.delete',$categories->id) }}" class="btn btn-danger"> Delete </a></td>

                      
                    </tr>

                   @endforeach 
                  </tbody>
                </table>
                      
                    </div>
                   
                  </div>
                  </div>


  @endsection
         