 @extends('layouts.home')
@section('content')


<style>
	.buttons-html5 , .buttons-print{
		background: #28a745;
    color: #fff;
    padding: 2px 12px;
    border: 1px solid #fff;
    margin: 5px;
	}
</style>
<div id='app'>
 <x:notify-messages />
</div>
	@include('dashboard.modalDelete')
<div class='tables'>

	<h1>@lang('user.item')</h1>
	 
	  	<div class='search'>
	  		<div class='container'>
	  			<div class='row'>

	  				


	  				<div class='col-3'>
	  					
	  					<a href='{{route('items.create')}}' class='btn btn-success'><i class='fas fa-plus'></i>  @lang('user.add')</a>
	  					
	  				</div>

	  				<div class='col-9'>

	  					<h3>@lang('user.catigories')</h3>

	  					<?php
	  					$catigories = \App\catigoryModel::all();
	  					?>
	  					<a class='btn btn-success' href='{{route('items.index')}}'>@lang('user.all')</a>
	  					@foreach($catigories as $cat)
	  					<a class='btn btn-primary' href="{{route('items.index' , ['id' => $cat->id])}}">{{$cat->name}}</a>
	  					@endforeach
	  				</div>
	  				
	  			</div>
	  		</div>
	  	</div>

	<table class="table table-striped text-center" id='myTable'>
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">@lang('user.name')</th>
	      <th scope="col">@lang('user.srialNumber')</th>
	      <th scope="col">@lang('user.color')</th>
	      <th scope="col">@lang('user.salary')</th>
	      <th scope="col">@lang('user.salesSalary')</th>
	      <th scope="col">@lang('user.count')</th>
	      <th scope="col">@lang('user.cat_name')</th>
	      <th scope="col">@lang('user.controle')</th>
	     
	    </tr>
	  </thead>
	  <tbody>



	  	@foreach($data as $row)

	  	<tr>
	  		<td>{{$row->id}}</td>
	  		<td>{{$row->name}}</td>
	  		<td>{{$row->srialNumber}}</td>
	  		<td>{{$row->color}}</td>
	  		<td>{{$row->salary}}</td>
	  		<td>{{$row->salesSalary}}</td>
	  		<td>{{$row->count}}</td>
	  		<td>{{$row->cat_name}}</td>

	  		

	  			
	  		<td>
	  			<a href='{{route("items.edit" , $row->id)}}' class="btn btn-primary">@lang('user.edit') <i class='fa fa-edit'></i></a>
	  		
	  			
	  			

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


<script src='{{asset("js/dataTables.buttons.min.js")}}'></script>
<script src='{{asset("js/jszip.min.js")}}'></script>
<script src='{{asset("js/vfs_fonts.js")}}'></script>
<script src='{{asset("js/buttons.html5.min.js")}}'></script>
<script src='{{asset("js/buttons.print.min.js")}}'></script>
<script>
	
	$(document).ready( function () {

    $('#myTable').DataTable({
    	 dom: 'Bfrtip',
        buttons: [

            'excel', 'print' ,
      
        ]
    });
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



	$('.modalAction').attr('action' , '{{url("items")}}/'+id);

	
})


</script>

@endpush

