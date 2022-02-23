 @extends('layouts.home')
@section('content')



<div id='app'>

	
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1 class='h1'> @lang('user.edit')</h1>
@include('dashboard.errors')



<form action='{{route("catigory.update" , $data->id)}}' method='POST'>

	{{csrf_field()}}
	{{method_field('PUT')}}

	<label>
		اسم القسم
		<input type='text' name='name' required class='form-control' value='{{$data->name}}'>
	</label>
	
	

	<button type='submit' class='btn btn-success'>Save <i class='fas fa-save'></i></button>
</form>

</div>



@endsection


