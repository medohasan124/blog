 @extends('layouts.home')
@section('content')



<div id='app'>

<h1 class='h1'> @lang('user.add')</h1>
@include('dashboard.errors')



<form action='{{route("catigory.store")}}' method='POST'>

	{{csrf_field()}}

	<label>
		اسم القسم
		<input type='text' name='name' required class='form-control'>
	</label>
	
	<button type='submit' class='btn btn-success'>Save <i class='fas fa-save'></i></button>
</form>

</div>



@endsection


