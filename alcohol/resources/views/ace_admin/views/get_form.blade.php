@if($sub_categories)
<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row">
  <div class="col-md-12">
		{{ Form::select('item_id', $sub_category_select) }}
  </div>
</div>

<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
<div class="row">
  <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
  <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
  <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
</div>
@else

@endif