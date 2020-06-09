@extends('management.layouts.app')

@section('content')
  <div class="main-content">
		<div class="breadcrumb">
                    <h1>Food </h1>
                    <ul>
                        <li><a href="">Lists</a></li>
                        <li>Food </li>
                    </ul>
        </div>
		  <div class="separator-breadcrumb border-top"></div>
		  
		  
		  <management-food-details></management-food-details>
				
</div>
@endsection
