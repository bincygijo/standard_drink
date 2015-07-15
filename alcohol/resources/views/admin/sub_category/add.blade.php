@extends('layouts.admin')
@section('page_heading','Add Sub Category - Admin')
@section('section')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			
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

					<form class="form" role="form" method="POST" action="{{ URL::to('/admin/sub_category/add')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="row">
							<div class="form-group col-md-6">
								<label >Category</label>
								<div>
								@if(isset($category->id))
									{{ Form::select('category_id', $categories, Input::old('category_id' , $category->id ), ['class' => 'form-control'])}}
								@else
									{{ Form::select('category_id', $categories, null, ['class' => 'form-control'])}}
								@endif	
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>Sub Category Name</label>
							<div>
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label>Sub Category Description</label>
							<div>
								<textarea name="description" id="description" class="form-control" rows="6"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-lg-3">
								<label>Liter per item/Qty</label>
								<div class="">
									<input type="number"  step="any" min="0"  id="liter_per_item" class="form-control" name="liter_per_item" value="{{ old('liter_per_item') }}">
								</div>
							</div>

							<div class="form-group col-lg-3">
								<label>Alcohol %</label>
								<div class="">
									<input type="number"  step="any"  min="0"   id="alcohol_content_per_item" class="form-control" name="alcohol_content_per_item" value="{{ old('alcohol_content_per_item') }}">
								</div>
							</div>
						</div>
						<hr/>
						
						<div class="form-group">
							<div class="pull-right">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Add
								</button>
							</div>
						</div>
					</form>
			
			</div>
		</div>
	</div>
</div>
@endsection
