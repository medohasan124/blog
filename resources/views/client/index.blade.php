 @extends('layouts.home')
@section('content')



<div id='app'>

	@include('dashboard.modalDelete')
<div class='tables'>
	   <x:notify-messages />

	<table class="table table-striped text-center" id='test'>
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">@lang('user.name')</th>
	      <th scope="col">@lang('user.number')</th>
	      <th scope="col">@lang('user.address')</th>
	      <th scope="col">@lang('user.idcard')</th>
	      <th scope="col">@lang('user.controle')</th>
	     
	    </tr>
	  </thead>
	  <tbody>

	  	<div class='search'>
	  		<div class='container'>
	  			<div class='row'>



	  				<div class='col-3'>
	  				
	  					<a href='{{route('client.create')}}' class='btn btn-success'><i class='fas fa-plus'></i>  @lang('user.add') </a>
	  					
	  				</div>
	  				
	  			</div>
	  		</div>
	  	</div>


	  	@foreach($data as $row)

	  	<tr>
	  		<td>{{$row->id}}</td>
	  		<td>{{$row->name}}</td>
	  		<td>{{$row->phone}}</td>
	  		<td>{{$row->address}}</td>
	  		<td>{{$row->idCard}}</td>
	  		
	  		

	  			<td>
	  			
	  			
	  			<a href='{{route("client.edit" , $row->id)}}' class="btn btn-primary">@lang('user.edit') <i class='fa fa-edit'></i></a>
	  			
	  			
		  			
		  			<a  id='{{$row->id}}' href='#' data-toggle="modal" data-target="#delete-{{$row->id}}" class="btn btn-danger deleteBtn">@lang('user.delete') <i class='fa fa-trash'></i></a>
		  			
	  			


	  		</td>
	  	</tr>
	  	@endforeach
		


	  </tbody>
</table>
</div>

</div>



@endsection

@push('scripts')

<script>
	
	$(document).ready( function () {
    $('#test').DataTable();
} );


$('.deleteBtn').on('click' , function(){
	var id = $(this).attr('id');

	var datatarget = $(this).attr('data-target');

	var ids = datatarget.split('#');

	

	$('.deleteModal').attr('id' , ids[1]);



	var urls = $('.modalAction').attr('action');

	var splets = urls.split('/') ;
	splets.pop();
	splets.push(id) ;
	splets[1] = '/';

	console.log(splets);

	$('.modalAction').attr('action' , '{{url("client")}}/'+id);

	
})


</script>

@endpush

