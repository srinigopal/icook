@extends('superadmin.layouts.app')

@section('content')
  <div class="main-content">
		<div class="breadcrumb">
                    <h1>Food </h1>
					 <ul>
                        <li><a href="">Edit</a></li>
                        <li>Food </li>
                    </ul>
                    
        </div>
		  <div class="separator-breadcrumb border-top"></div>
		  
		  
		  <food-new :id="'{{$id}}'"></food-new>
				
</div>
@endsection
