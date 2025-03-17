@extends('layout')
@section('title','Homepage')
@section('content')
 @auth
   &nbsp;   &nbsp; {{ auth()->user()->name }}
 @endauth
@endsection