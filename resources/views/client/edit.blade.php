 @extends('layouts.home')
@section('content')



<div id='app'>

<h1 class='h1'> @lang('user.edit')</h1>
@include('dashboard.errors')



<form action='{{route("client.update" , $data->id)}}' method='POST'>

	{{csrf_field()}}
	{{method_field('PUT')}}
<div clas='row'>
	<div class='col-md-3'>
		<label>
			@lang('user.name')
			<input type='text' name='name' required class='form-control' value='{{$data->name}}'>
		</label>

	</div>

	<div class='col-md-3'>
		<label>
			@lang('user.number')
			<input type='number' name='phone' required class='form-control' value='{{$data->phone}}'>
		</label>
	</div>

	<div class='col-md-3'>
		<label>
			@lang('user.address')
			<input type='text' name='address' required class='form-control' value='{{$data->address}}'>
		</label>
	</div>


	<div class='col-md-3'>
		<label>
			@lang('user.idcard')
			<input type='text' name='idCard' required class='form-control' value='{{$data->idCard}}'>
		</label>
	</div>

</div>
	

	<button type='submit' class='btn btn-success'>Save <i class='fas fa-save'></i></button>
</form>

</div>



@endsection


