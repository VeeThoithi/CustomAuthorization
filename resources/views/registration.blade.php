@extends('layout')
@section('title','REGISTRATION')
@section('content')

    <div class="container">
    <div class="mt-5">
           @if($errors->any())
           <div class="col-12">
               @foreach($errors->all() as $error)
               <div class="alert alert-danger">{{ $error}}</div>
               @endforeach
           </div>
           @endif

        @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error')}}</div>
        @endif

        @if (session()->has('success'))
        <div class="alert alert-danger">{{ session('success')}}</div>
        @endif
        </div>
        
 <form action="{{ route('registration.post') }}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px;">
    @csrf
 <label>Enter Full Name</label>
<input class="form-control" type="text" name="name" autocomplete="off" required />
<label>Mobile Number :</label>
<input class="form-control" type="text" name="mobilenumber" maxlength="10" autocomplete="off" required />
<label>Enter Email</label>
<input class="form-control" type="email" name="email" id="emailid" onBlur="checkAvailability()"  autocomplete="off" required  />
   <span id="user-availability-status" style="font-size:12px;"></span> 
<label>Enter Password</label>
<input class="form-control" type="password" name="password" autocomplete="off" required  />
<label>Confirm Password </label>
<input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />                
<button type="submit" name="signup" class="btn btn-danger" id="submit">Register Now </button>
</form>
    </div>


@endsection