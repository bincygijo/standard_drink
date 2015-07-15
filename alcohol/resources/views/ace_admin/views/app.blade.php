<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Wine project | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset('/public/ace_admin/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- FontAwesome 4.3.0 -->
        <link href="{{ asset('/public/assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        
        <!-- Theme style -->
        <link href="{{ asset('/public/ace_admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link href="{{ asset('/public/ace_admin/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue sidebar-collapse">
        <div class="wrapper">
            @include('ace_admin.views.includes.header')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    Dashboard
                    <small>Test</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1
                </div>
                <strong></strong>
				<br/>
            </footer>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.3 -->
        <script src="{{ asset('/public/ace_admin/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
        <!-- jQuery UI 1.11.2 -->
        <script src="{{ asset('/public/assets/js/jquery.js')}}" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{{ asset('/public/ace_admin/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('/public/ace_admin/dist/js/pages/dashboard.js') }}" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script>
            $(function(){
                $(".radio_cat_list").change(function () {
                    var data_id = $(this).val();
                    var data_description = $("#description_" + data_id).val();
                    var data_standard = $("#standard_" + data_id).val();
                    $("#selected_item_details").html(data_description);
                    $("#selected_item_details").append("<h4> Standard drink - " + data_standard + " mls.</h4>");
                    /*$.ajax({
                      method: "GET",
                      url: "{{URL::to('get_form')}}",
                      data: { "category_id":data_id }
                    }).done(function( form ) {
                        $("#form_page").html(form);
                    });*/
                });

                $("#calculator_form").on("submit", function(){
                    $("#form_results").html("");
                    var form_temp = $("#form_temp").val();
                    var form_amount = parseInt($("#form_amount").val())/1000;
                    var form_percentage = $("#form_percentage").val();
                    var result = form_amount * form_percentage * form_temp;
                    result = Math.round(result* 100) / 100;
                    var appr = Math.round(result);
                    var appr_text = "";
                    if(appr >= 0) {
                        appr_text = " (approx " + appr + " standard drink)</h2>";
                    }
                    $("#form_results").html("<h2>Standard drink " + result + appr_text)
                    return false;
                })
            })
        </script>    
    </body>
</html>