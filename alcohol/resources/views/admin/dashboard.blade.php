@extends('layouts.admin')
@section('page_heading','Administrator dashboard')
@section('section')
<div class="col-sm-12">
<div class="row">
    <div class="col-lg-6">
		  <a href="{{URL::to('/admin/categories/add')}}" id="add_categories" class="btn btn-default">Add new category</a>
		  <!--<a href="{{URL::to('/admin/sub_categories/add')}}" id="add_sub_categories" class="btn btn-default">Add new sub category</a>-->
    </div>
</div>
<hr/>
<div class="row" id="server_listing">
@if($sub_catgories)
	<div class="col-sm-12">
			@section ('cotable_panel_title','Category list')
			@section ('cotable_panel_body')
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>URL</th>
						<th>Action</th>
					</tr>
				</thead>
				
				<tbody>
				
				</tbody>
			</table>	
			@endsection
			@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
		</div>
	
	@else
	    <div class="alert alert-warning " role="alert">
	        <i class="fa fa-warning"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  There is nothing to show.
	    </div>
	@endif	
	</div>
</div>
@endsection
