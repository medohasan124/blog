 @extends('layouts.home')
@section('content')



<div id='app'>



	@include('dashboard.modalDelete')

	<a href='{{route('catigory.create')}}' class='btn btn-success'><i class='fas fa-plus'></i>  @lang('user.add') </a>
<div class='tables'>
	

	<table class="table table-striped text-center" id='test'>
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">@lang('user.catigories')</th>
	     
	      <th scope="col">Controle</th>
	    </tr>
	  </thead>
	  <tbody>

	  	<div class='search'>
	  		<div class='container'>
	  			<div class='row'>	
	  				
	  			</div>
	  		</div>
	  	</div>


	  	@foreach($data as $row)

	  	<tr>
	  		<td>{{$row->id}}</td>
	  		<td>{{$row->name}}</td>
	  		
	  		

	  			<td>
	  			
	  			
	  			<a href='{{route("catigory.edit" , $row->id)}}' class="btn btn-primary">@lang('user.edit') <i class='fa fa-edit'></i></a>
	  			
	  			
	  		
	  			
		  			
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

	$('.modalAction').attr('action' , '{{url("catigory")}}/'+id);

	
})


</script>

@endpush

