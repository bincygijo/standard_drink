@extends('ace_admin.views.app')
@section('content')
<!-- Small boxes (Stat box) -->
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
        <div class="box box-info">
            <div class="box-header">
                <i class="fa fa-envelope"></i>
                <h3 class="box-title">Can you pour a standard drink?</h3>
                <!-- tools box -->

                <div class="box-body">
                    
                        @if($categories)
                            <hr/>
                            <div class="container-fluid">
                                <div class="row">
                                    @foreach($categories as $category)
                                        
                                        <div class="col-md-4" style="margin-bottom:10px !important;">
                                          <div class="input-group">
                                             <span class="input-group-addon">
                                               <input id="cat_{{$category->id}}" value="{{$category->id}}" name="category_select" type="radio" class="radio_cat_list">
                                             </span>
                                             <label for="cat_{{$category->id}}"  class="btn btn-default">{{$category->name}}</label>
                                             <input type="hidden" id="description_{{$category->id}}" name="description_{{$category->id}}" value="{{$category->description}}" />
                                             <input type="hidden" id="standard_{{$category->id}}" name="standard_{{$category->id}}" value="{{round($category->standard,2)}}" />
                                          </div><!-- /input-group -->
                                        </div><!-- /.col-lg-6 -->
                                        
                                    @endforeach
                                </div>    
                            </div>
                            <hr/>
                            <div class="container-fluid" style="min-height:200px;">
                                <div class="row" id="form_page">

                                    <div class="col-md-12">
                                    <form role="form" id="calculator_form">
                                        <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Amount of drink (ml)</label>
                                                    <div class="input-group">
                                                      <input type="number" step="any"  required="required" class="form-control" aria-label="Amount of drink" placeholder="0.00" name="form_amount" id="form_amount">
                                                      <span class="input-group-addon">ml</span>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Alcohol %</label>
                                                    <div class="input-group">
                                                      <input type="number" step="any" required="required" class="form-control" aria-label="Amount of drink" placeholder="0.00" name="form_percentage" id="form_percentage">
                                                      <span class="input-group-addon">%</span>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Room Temperature</label>
                                                    <input class="form-control" step="any" required="required" type="number" value="0.789" name="form_temp" id="form_temp">
                                                </div>
                                        </div>
                                        <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                   <button class="btn btn-default form-control" id="sendEmail">Calculate <i class="fa fa-arrow-circle-right"></i></button>
                                                </div>
                                        </div>
                                    </form>    
                                    </div>    
                                    <div class="col-md-12" id="form_results">

                                    </div>
                                </div>
                            </div>    
                        @else
                            <div class="alert alert-warning">
                                <strong>Error!</strong> There is no categories to list.
                            </div>
                        @endif
                   
                </div>
            </div>
        </div>
    </section>
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">
        <!-- Map box -->
        <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
                <!-- tools box -->
                <div class="pull-right box-tools">
                   
                    </div><!-- /. tools -->
                    <i class="fa fa-map-marker"></i>
                    <h3 class="box-title">
                    Results
                    </h3>
            </div>
            <div class="box-body">
            	<div id="selected_item_details" style="height: 250px; width: 100%;">
				    <h3>What’s a standard drink?</h3>
                    <p>
                        A standard drink is how much alcohol the average person can process in one hour. You can’t speed this process up, and your body can only deal with one drink at a time. So, if you have three standard drinks, it will take three hours for your body to process them. The size of a standard drink depends on how strong your beer, wine or spirit is.
                    </p>    
				</div>
            </div><!-- /.box-body-->
            <div class="box-footer no-border">
                <div class="row">
                    <div class="col-xs-12 text-center" style="border-right: 1px solid #f4f4f4">
                        <div id="sparkline-1"></div>
                        <div class="knob-label"></div>
                    </div><!-- ./col -->
                </div><!-- /.row -->
            </div>
        </div>
	    <!-- /.box -->
	    <!-- solid sales graph -->
	    
    </section><!-- right col -->
</div><!-- /.row (main row) -->
@endsection
