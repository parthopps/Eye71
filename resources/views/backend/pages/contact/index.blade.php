@extends("layouts.adminmaster")

 @section('content') 
            <div class="dashboard-wrappe">

                <div class="container" style="padding-top: 50px;padding-left: 80px;">
                  <div class="row">
                    <div class="col-md-1">
                      
                    </div>
                    <div class="col-md-10">
                      <h1 style="color:black;"> Manage Contact </h1>
                      <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone Number</th>
                      <th scope="col">Address</th>
                      <th scope="col">Facebook</th>
                      <th scope="col">Instagram</th>
                      <th scope="col">Twitter</th>
                  
                  
                      <th scope="col">Action</th>
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                  <?php $i=1; ?>
                  @foreach ($contact as $contact)
                 
                    <tr>
                      <th scope="row"><?php echo $i++ ?></th> 
                      <th scope="row">{{ $contact->email }}</th>
                      <td>{{ $contact->phone_number }}</td>
                      <td>{{ $contact->address }}</td>
                      <td>{{ $contact->facebook }}</td>
                      <td>{{ $contact->instagram }}</td>
                       <td>{{ $contact->twitter }}</td>
                      
                      
                         
                     <td><a href="{{ route('admin.contact.edit',$contact->id) }}" class="btn btn-danger"> Delete </a></td>
                      
                    </tr>

                   @endforeach 
                  </tbody>
                </table>
                      
                    </div>
                   
                  </div>
                  </div>


  @endsection
         