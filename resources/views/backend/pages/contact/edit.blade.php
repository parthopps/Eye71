@extends("layouts.adminmaster")

@section('content')
<div class="dashboard-wrapper">
 
  <div class="container" style="padding-top: 50px;padding-left: 70px;">
    <div class="row">
      <div class="col-md-1">
        
      </div>
      <div class="col-md-6">
        <h1 style="color:black;"> Edit contact </h1>
        <form method="post" action="{{ route('admin.contact.update',$contact->id) }}" enctype="multipart/form-data">
          <!-- {{ csrf_field() }} -->
          @csrf

          <div class="form-group">
   
      </div>
      <div class="form-group">
        <label>email</label>
        <input type="text" class="form-control" name="email"  placeholder="Enter contact name" value="{{ $contact->email }}" >
      </div>
      <div class="form-group">
        <label>Phone Number</label>
        <input type="text" class="form-control" name="phone_number"  placeholder="Enter contact name" value="{{ $contact->phone_number }}" >
      </div>
      <div class="form-group">
        <label>address</label>
        <input type="text" class="form-control" name="address"  placeholder="Enter contact name" value="{{ $contact->address }}" >
      </div>
      <div class="form-group">
        <label>facebook</label>
        <input type="text" class="form-control" name="facebook"  placeholder="Enter contact name" value="{{ $contact->facebook }}" >
      </div>
      <div class="form-group">
        <label>instagram</label>
        <input type="text" class="form-control" name="instagram"  placeholder="Enter contact name" value="{{ $contact->instagram }}" >
      </div>
      <div class="form-group">
        <label>twitter</label>
        <input type="text" class="form-control" name="twitter"  placeholder="Enter contact name" value="{{ $contact->twitter }}" >
      </div>

     

    
    
     
    <button type="submit" class="btn btn-primary" style="margin: 20px;">Upadate contact</button>
  </form>
      </div>
     
    </div>
    </div>


  @endsection
         