@extends('layouts.admin')
@section('page_heading','Listing categories')
@section('section')
<div class="col-sm-12">
<div class="row">
    <div class="col-lg-6">
		  <a href="{{URL::to('/admin/category/add')}}" id="add_categories" class="btn btn-default">Add new category</a>
		  <!--<a href="{{URL::to('/admin/sub_category/add')}}" id="add_sub_categories" class="btn btn-default">Add new sub category</a>-->
    </div>
</div>
<hr/>
<div class="row" id="server_listing">
@if($categories)
	<div class="col-sm-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Description</th>
						<th>Standard(mls)</span></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($categories as $key => $category)
					<tr>
						<tr >
						<td style="width:5% !important;">{{$category->id}}</td>
						<td>{{$category->name}}</td>
						<td>{{$category->description}}</td>
						<td style="width:10% !important;">{{$category->standard}}</td>
						<td style="width:15% !important;">
						<div style="float:left;">	
							<a href="{{URL::to('admin/category/' .$category->id . '/edit')}}" class="btn-link btn"><i class="fa fa-pencil fa-fw"></i></a>
							{{ Form::open(['url' => ['admin/category/' .$category->id . '/delete'], 'method' => 'delete', "class" => "pull-right"]) }}
								<button class="btn-link btn" type="submit" onclick="return confirm('Do you want to delete this?')"><i  class="fa fa-trash fa-fw"></i></button>
							{{ Form::close() }}
							<!--<a href="{{URL::to('admin/sub_category/add/' .$category->id)}}" class="btn-link btn" title="Add sub category"><i class="fa fa-glass fa-fw"></i></a>-->
						</div>	
						</td>
					</tr>
				@endforeach	
				</tbody>
			</table>	
			{{ $categories->render() }}
		</div>
	
	@else
	    <div class="alert alert-warning " role="alert">
	        <i class="fa fa-warning"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  There is nothing to show.
	    </div>
	@endif	
	</div>
</div>
@endsection
