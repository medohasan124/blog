@extends('layouts.home')
@section('content')



<h1 class='h1'> @lang('user.edit')</h1>
@include('dashboard.errors')


 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
<form action="{{route('items.update' , $data->id)}}" method='POST' enctype="multipart/form-data">
	<input type="hidden" name="_token" value='{{csrf_token()}}'>
{{method_field('PUT')}}


	
<div class='add'>
	<div class='container'>
		<div class='row'>
			  
			<div class='col-6'>
				<label>@lang('user.srialNumber')</label>
				<input type="text" name="srialNumber" class='form-control' required value='{{$data->srialNumber}}'>
			</div>

			<div class='col-6'>
				<label>@lang('user.name')</label>
				<input type="text" name="name" class='form-control' required value='{{$data->name}}'>
			</div>

			<div class='col-6'>
				<?php 
				$catigory = \App\catigoryModel::all();
				?>
				<label>@lang('user.catigories')</label>
				<select name='cat_id' class='form-control' required >

					@foreach($catigory as $cat)
					<option value='{{$cat->id}}'

						@if($cat->id == $data->cat_id)
						selected
						@endif
						>{{$cat->name}}</option>
					@endforeach
					
				</select>
			</div>

			

			<div class='col-6'>
				<label>@lang('user.salary')</label>
				<input type="number" name="salary" class='form-control' required value='{{$data->salary}}'>
			</div>

			<div class='col-6'>
				<label>@lang('user.salesSalary')</label>
				<input type="number" name="salesSalary" class='form-control' required value='{{$data->salesSalary}}'>
			</div>


			<div class='col-6'>
				<label>@lang('user.store')</label>
				<input type="number" name="count" class='form-control' required value='{{$data->count}}'>
			</div>

			<div class='col-6'>
				<label>@lang('user.color')</label>
				<input type="text" name="color" class='form-control' required value='{{$data->color}}'>
			</div>


		
			<hr>
			
			
		</div>

		
<button class='btn btn-success'><i class='fas fa-pen'></i> @lang('user.edit')</button>
	</div>
</div>
</form>

<br />


@endsection


