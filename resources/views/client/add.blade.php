 @extends('layouts.home')
@section('content')



<div id='app'>

<h1 class='h1'> @lang('user.add')</h1>
@include('dashboard.errors')



<form action='{{route("client.store")}}' method='POST'>

	{{csrf_field()}}
<div class='row'>

	<div class='col-md-3'>
		<label>
		@lang('user.name')
			<input type='text' name='name' required class='form-control' value='{{old("name")}}'>
		</label>

	</div>

	<div class='col-md-3'>
		<label>
			@lang('user.number')
			<input type='number' name='phone'  required class='form-control' value='{{old("phone")}}'>
		</label>
	</div>

	<div class='col-md-3'>
		<label>
			@lang('user.address')
			<input type='text' name='address' required class='form-control' value='{{old("address")}}'>
		</label>
	</div>



	<div class='col-md-3'>
		<label>
			@lang('user.idcard')
			<input type='number' name='idCard'  required class='form-control' value='{{old("idcard")}}'>
		</label>
	</div>


</div>

	
	
	

	<button type='submit' class='btn btn-success'>Save <i class='fas fa-save'></i></button>
</form>

</div>



@endsection


