@extends('layouts.home')
@section('content')



<h1 class='h1'> @lang('user.add')</h1>
@include('dashboard.errors')


	   <x:notify-messages />
    
     
<form action="{{route('items.store')}}" method='POST' enctype="multipart/form-data">
	<input type="hidden" name="_token" value='{{csrf_token()}}'>



	
<div class='add'>
	<div class='container'>
		<div class='row'>
			  

			<div class='col-6'>
				<label>@lang('user.srialNumber')</label>
				<input type="text" name="srialNumber" class='form-control' required value='{{old("srialNumber")}}'>
			</div>

				<div class='col-6'>
				<label>@lang('user.name')</label>
				<input type="text" name="name" class='form-control' required value='{{old("name")}}'>
			</div>

			<div class='col-6'>
				<?php 
				$catigory = \App\catigoryModel::all();
				?>
				<label>@lang('user.catigories')</label>
				<select name='cat_id' class='form-control' required>
					@foreach($catigory as $cat)
					<option value='{{$cat->id}}'>{{$cat->name}}</option>
					@endforeach
					
				</select>
			</div>

			

			<div class='col-6'>
				<label>@lang('user.salary')</label>
				<input type="number" name="salary" class='form-control' required value='{{old("salary")}}'>
			</div>

			<div class='col-6'>
				<label>@lang('user.salesSalary')</label>
				<input type="number" name="salesSalary" class='form-control' required value='{{old("salesSalary")}}'>
			</div>

			<div class='col-6'>
				<label>@lang('user.store')</label>
				<input type="number" name="count" class='form-control' required value='{{old("count")}}'>
			</div>

			<div class='col-6'>
				<label>@lang('user.color')</label>
				<input type="text" name="color" class='form-control' required value='{{old("color")}}'>
			</div>


		
			<hr>
			
			
		</div>

		
<button class='btn btn-success'><i class='fas fa-plus'></i> @lang('user.add')</button>
	</div>
</div>
</form>

<br />


@endsection


