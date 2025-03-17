@extends('layout')
@section('title','LOGIN')
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

 <form action="{{ route('login.post') }}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px;">
  @csrf
<label>Enter Email </label>
<input class="form-control" type="text" name="email" required autocomplete="off" />
<label>Password</label>
<input class="form-control" type="password" name="password" required autocomplete="off"  />
<p class="help-block"><a href="" style="text-decoration:none">Forgot Password</a></p>
 <button type="submit" name="login" class="btn btn-info">LOGIN </button> | 
 <a href="{{ route('registration') }}" style="text-decoration:none">Not Registered Yet</a>
</form>
    </div>
    
@endsection