@extends('superadmin.layouts.app')

@section('content')
  <div class="main-content">
		<div class="breadcrumb">
         <h1>Restaurants </h1>
                     <li><a href="">Edit</a></li>
                    <ul>
                        <li>Restaurants </li>
                    </ul>
        </div>
		  <div class="separator-breadcrumb border-top"></div>
		  
		  
		  <organisation-new :id="'{{$id}}'"></organisation-new>
				
</div>
@endsection
