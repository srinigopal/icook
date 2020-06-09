@extends('superadmin.layouts.app')

@section('content')
  <div class="main-content">
		<div class="breadcrumb">
                    <h1>Category </h1>
                        <li><a href="">Edit</a></li>
                    <ul>
                        <li>Category </li>
                    </ul>
        </div>
		  <div class="separator-breadcrumb border-top"></div>
		  
		  
		  <category-new :id="'{{$id}}'"></category-new>
				
</div>
@endsection
