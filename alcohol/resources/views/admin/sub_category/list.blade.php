@extends('layouts.admin')
@section('page_heading','Listing Sub categories')
@section('section')
<div class="col-sm-12">
<div class="row">
    <div class="col-lg-6">
		  <a href="{{URL::to('/admin/category/add')}}" id="add_categories" class="btn btn-default">Add new category</a>
		  <a href="{{URL::to('/admin/sub_category/add')}}" id="add_sub_categories" class="btn btn-default">Add new sub category</a>
    </div>
</div>
<hr/>
<div class="row" id="server_listing">
@if($sub_categories)
	<div class="col-sm-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Category</th>
						<th>Ltr/item</th>
						<th>Alcohol %</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($sub_categories as $key => $sub_category)
					<tr>
						<tr >
						<td style="width:5% !important;">{{$sub_category->id}}</td>
						<td>{{$sub_category->name}}</td>
						<td>{{$sub_category->category->name}}</td>
						<td>{{$sub_category->liter_per_item}}</td>
						<td>{{$sub_category->alcohol_content_per_item}}</td>
						<td style="width:15% !important;">
						<div style="float:left;">	
							<a href="{{URL::to('admin/sub_category/' .$sub_category->id . '/edit')}}" class="btn-link btn"><i class="fa fa-pencil fa-fw"></i></a>
							{{ Form::open(['url' => ['admin/sub_category/' .$sub_category->id . '/delete'], 'method' => 'delete', "class" => "pull-right"]) }}
								<button class="btn-link btn" type="submit" onclick="return confirm('Do you want to delete this?')"><i  class="fa fa-trash fa-fw"></i></button>
							{{ Form::close() }}
						</div>	
						</td>
					</tr>
				@endforeach	
				</tbody>
			</table>	
			{{ $sub_categories->render() }}
		</div>
	
	@else
	    <div class="alert alert-warning " role="alert">
	        <i class="fa fa-warning"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  There is nothing to show.
	    </div>
	@endif	
	</div>
</div>
@endsection
