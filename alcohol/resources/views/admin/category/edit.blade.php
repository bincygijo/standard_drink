@extends('layouts.admin')
@section('page_heading','Edit Category - Admin')
@section('section')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Category</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form" role="form" method="POST" action="{{ URL::to('/admin/category/' . $category->id . '/edit')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label >Category Name</label>
							<div>
								<input type="name" class="form-control" name="name" value="{{ Input::old('name' , $category->name ) }}">
							</div>
						</div>

						<div class="form-group">
							<label>Category Description</label>
							<div>
								<textarea name="description" id="description" class="form-control" rows="6">{{ Input::old('description' , $category->description ) }}</textarea>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-3">
									<label>Standard rate</label>
									<div class="input-group">
								      <input type="text" class="form-control" id="standard" name="standard" placeholder="0.00"  value="{{ Input::old('standard' , $category->standard ) }}">
								      <div class="input-group-addon">mls</div>
								    </div>
							</div>
						</div>	
						<div class="form-group">
							<div class="pull-right">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Update
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
