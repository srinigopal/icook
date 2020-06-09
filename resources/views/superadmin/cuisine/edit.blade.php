@extends('superadmin.layouts.app')

@section('content')
  <div class="main-content">
		<div class="breadcrumb">
                    <h1>Cuisine </h1>
                    <ul>
                        <li><a href="">Edit</a></li>
                        <li>Cuisine </li>
                    </ul>
        </div>
		  <div class="separator-breadcrumb border-top"></div>
		  
		  
		  <cuisine-new :id="'{{$id}}'"></cuisine-new>
				
</div>
@endsection
