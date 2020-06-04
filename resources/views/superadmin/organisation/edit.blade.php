@extends('superadmin.layouts.app')

@section('content')
  <div class="main-content">
		<div class="breadcrumb">
         <h1>Restaurants </h1>
                   
        </div>
		  <div class="separator-breadcrumb border-top"></div>
		  
		  
		  <organisation-new :id="'{{$id}}'"></organisation-new>
				
</div>
@endsection
